<?php

namespace App\Livewire;

use App\Models\ExamResult;
use App\Models\Vocabulary;
use Livewire\Component;

class ExamComponent extends Component
{
    public $questionCount    = 10;
    public $allowRepeat      = false;
    public $examStarted      = false;
    public $examFinished     = false;

    public $allVocabularies    = [];
    public $questions          = [];
    public $currentQuestionIndex = 0;
    public $questionTypes      = [];

    public $userAnswer    = '';
    public $answerResult  = null;
    public $correctAnswer = '';

    public $correctCount      = 0;
    public $incorrectCount    = 0;
    public $answeredQuestions = [];

    public $testType   = 'en_to_zh';
    public $mixedMode  = false;

    public $importanceFilter   = 'all';
    public $selectedLanguage   = 'all';
    public $availableLanguages = [];

    public $questionRangeStart = null;
    public $questionRangeEnd   = null;
    public $totalCount         = 0;

    public $infiniteMode   = false;
    public $listeningMode  = false;
    public $wordHidden     = false;

    public $userAnswers = [];

    // SRS 模式
    public $srsMode = false;

    public function mount($srs = false)
    {
        $this->srsMode = (bool) $srs;
        $this->loadVocabularies();
        $this->loadAvailableLanguages();
        $this->infiniteMode = ($this->questionCount == 0);
    }

    private function loadVocabularies()
    {
        $userId = auth()->id();
        $query  = Vocabulary::where('user_id', $userId);

        if ($this->importanceFilter === 'important') {
            $query->where('is_important', true);
        } elseif ($this->importanceFilter === 'not_important') {
            $query->where('is_important', false);
        }

        if ($this->selectedLanguage !== 'all') {
            $query->where('language_type', $this->selectedLanguage);
        }

        // SRS 模式：只載入過去三天內答錯過的單字
        if ($this->srsMode) {
            $wrongIds = ExamResult::where('user_id', auth()->id())
                ->where('is_correct', false)
                ->where('created_at', '>=', now()->subDays(3))
                ->pluck('vocabulary_id')
                ->unique()
                ->values();
            $query->whereIn('id', $wrongIds);
        }

        $query->orderBy('id', 'asc');
        $this->totalCount = (clone $query)->count();

        if (!$this->srsMode && ($this->questionRangeStart || $this->questionRangeEnd)) {
            $offset = 0;
            $limit  = null;

            if ($this->questionRangeStart && $this->questionRangeEnd) {
                $offset = max(0, $this->questionRangeStart - 1);
                $limit  = $this->questionRangeEnd - $this->questionRangeStart + 1;
            } elseif ($this->questionRangeStart) {
                $offset = max(0, $this->questionRangeStart - 1);
            } elseif ($this->questionRangeEnd) {
                $limit = $this->questionRangeEnd;
            }

            $query->skip($offset);
            if ($limit !== null) {
                $query->take($limit);
            }
        }

        $this->allVocabularies = $query->get()->toArray();
    }

    private function loadAvailableLanguages()
    {
        $this->availableLanguages = Vocabulary::where('user_id', auth()->id())
            ->select('language_type')
            ->distinct()
            ->pluck('language_type')
            ->toArray();
    }

    public function updatedImportanceFilter()  { $this->loadVocabularies(); if ($this->examStarted) $this->resetExam(); }
    public function updatedSelectedLanguage()  { $this->loadVocabularies(); if ($this->examStarted) $this->resetExam(); }
    public function updatedQuestionCount()     { $this->infiniteMode = ($this->questionCount == 0); }

    public function updatedQuestionRangeStart()
    {
        if ($this->questionRangeStart !== null && $this->questionRangeStart < 1) $this->questionRangeStart = 1;
        if ($this->questionRangeStart && $this->questionRangeEnd && $this->questionRangeStart > $this->questionRangeEnd) $this->questionRangeEnd = $this->questionRangeStart;
        $this->loadVocabularies();
        if ($this->examStarted) $this->resetExam();
    }

    public function updatedQuestionRangeEnd()
    {
        if ($this->questionRangeEnd !== null && $this->questionRangeEnd < 1) $this->questionRangeEnd = 1;
        if ($this->questionRangeStart && $this->questionRangeEnd && $this->questionRangeEnd < $this->questionRangeStart) $this->questionRangeStart = $this->questionRangeEnd;
        $this->loadVocabularies();
        if ($this->examStarted) $this->resetExam();
    }

    public function clearQuestionRange()
    {
        $this->questionRangeStart = null;
        $this->questionRangeEnd   = null;
        $this->loadVocabularies();
        if ($this->examStarted) $this->resetExam();
    }

    public function startExam()
    {
        $this->resetExam();

        if (count($this->allVocabularies) == 0) {
            $msg = $this->srsMode ? '今日沒有需要複習的單字！' : "根據目前的篩選條件，沒有找到可用的詞彙！";
            session()->flash('error', $msg);
            return;
        }

        if (!$this->allowRepeat && count($this->allVocabularies) < $this->questionCount && $this->questionCount != 0) {
            session()->flash('error', "詞彙不足以進行 {$this->questionCount} 題不重複測驗！");
            return;
        }

        $this->prepareQuestions();
        $this->examStarted = true;

        if ($this->listeningMode) {
            $this->wordHidden = true;
        }
    }

    private function prepareQuestions()
    {
        $availableVocabularies = $this->allVocabularies;
        $this->questions       = [];
        $this->questionTypes   = [];

        // SRS 模式：不重複、不限題數，全部跑完
        if ($this->srsMode) {
            shuffle($availableVocabularies);
            foreach ($availableVocabularies as $vocab) {
                $this->questions[]     = $vocab;
                $this->questionTypes[] = 'en_to_zh';
            }
            return;
        }

        $questionCount = $this->infiniteMode
            ? ($this->allowRepeat ? 100 : count($availableVocabularies))
            : $this->questionCount;

        for ($i = 0; $i < $questionCount; $i++) {
            if ($this->allowRepeat || count($availableVocabularies) > 0) {
                if ($this->allowRepeat) {
                    $randomIndex = array_rand($this->allVocabularies);
                    $vocabulary  = $this->allVocabularies[$randomIndex];
                } else {
                    $randomIndex = array_rand($availableVocabularies);
                    $vocabulary  = $availableVocabularies[$randomIndex];
                    unset($availableVocabularies[$randomIndex]);
                    $availableVocabularies = array_values($availableVocabularies);
                }

                $this->questions[] = $vocabulary;

                if ($this->listeningMode) {
                    $this->questionTypes[] = 'en_to_zh';
                } elseif ($this->mixedMode) {
                    $this->questionTypes[] = (mt_rand(0, 1) == 0) ? 'en_to_zh' : 'zh_to_en';
                } else {
                    $this->questionTypes[] = $this->testType;
                }
            } else {
                break;
            }
        }
    }

    public function checkAnswer()
    {
        $answers = array_values(array_filter(
            array_map('trim', $this->userAnswers),
            fn($v) => $v !== ''
        ));

        $currentQuestion = $this->questions[$this->currentQuestionIndex];
        $currentType     = ($this->listeningMode || $this->mixedMode || $this->srsMode)
            ? $this->questionTypes[$this->currentQuestionIndex]
            : $this->testType;

        if ($currentType == 'en_to_zh') {
            $correctMeanings    = is_array($currentQuestion['chinese_word'])
                ? $currentQuestion['chinese_word']
                : [$currentQuestion['chinese_word']];
            $this->correctAnswer = implode('、', $correctMeanings);

            $remaining = array_map('mb_strtolower', $correctMeanings);
            $allCorrect = true;

            foreach ($answers as $ans) {
                $key = array_search(mb_strtolower($ans), $remaining);
                if ($key !== false) {
                    unset($remaining[$key]);
                    $remaining = array_values($remaining);
                } else {
                    $allCorrect = false;
                    break;
                }
            }

            $this->answerResult = $allCorrect && empty($remaining);
        } else {
            $this->correctAnswer = $currentQuestion['english_word'];
            $this->answerResult  = mb_strtolower(trim($answers[0] ?? ''))
                === mb_strtolower(trim($this->correctAnswer));
        }

        if ($this->answerResult) {
            $this->correctCount++;
        } else {
            $this->incorrectCount++;
        }

        $this->answeredQuestions[] = [
            'question'           => $currentType == 'en_to_zh'
                ? $currentQuestion['english_word']
                : $this->correctAnswer,
            'correctAnswer'      => $this->correctAnswer,
            'userAnswer'         => implode('、', $answers),
            'isCorrect'          => $this->answerResult,
            'part_of_speech'     => $currentQuestion['part_of_speech'],
            'type'               => $currentType,
            'is_important'       => $currentQuestion['is_important'] ?? false,
            'language_type'      => $currentQuestion['language_type'] ?? 'english',
            'was_listening_mode' => $this->listeningMode,
        ];

        // ── 寫入 ExamResult ──
        $vocab = Vocabulary::find($currentQuestion['id']);
        if ($vocab) {
            ExamResult::create([
                'user_id'            => auth()->id(),
                'vocabulary_id'      => $vocab->id,
                'test_type'          => $currentType,
                'is_correct'         => $this->answerResult,
                'user_answer'        => implode('、', $answers),
                'language_type'      => $currentQuestion['language_type'] ?? 'english',
                'was_listening_mode' => $this->listeningMode,
            ]);

            // ── 更新 SRS ──
            $this->updateSRS($vocab, $this->answerResult);
        }

        if ($this->listeningMode) {
            $this->wordHidden = false;
        }
    }

    private function updateSRS(Vocabulary $vocab, bool $correct): void
    {
        if ($correct) {
            $vocab->srs_repetitions += 1;
            $vocab->srs_interval = match (true) {
                $vocab->srs_repetitions === 1 => 1,
                $vocab->srs_repetitions === 2 => 3,
                default => min(365, (int) round($vocab->srs_interval * $vocab->srs_ease / 100)),
            };
            $vocab->srs_ease = max(130, $vocab->srs_ease + 10);
        } else {
            $vocab->srs_repetitions = 0;
            $vocab->srs_interval    = 1;
            $vocab->srs_ease        = max(130, $vocab->srs_ease - 20);
        }

        $vocab->srs_next_review = now()->addDays($vocab->srs_interval);
        $vocab->save();
    }

    public function nextQuestion()
    {
        $this->userAnswers  = [];
        $this->answerResult = null;

        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
            if ($this->listeningMode) $this->wordHidden = true;
        } else {
            if ($this->infiniteMode && $this->allowRepeat && count($this->allVocabularies) > 0) {
                $randomIndex       = array_rand($this->allVocabularies);
                $this->questions[] = $this->allVocabularies[$randomIndex];

                if ($this->listeningMode) {
                    $this->questionTypes[] = 'en_to_zh';
                } elseif ($this->mixedMode) {
                    $this->questionTypes[] = (mt_rand(0, 1) == 0) ? 'en_to_zh' : 'zh_to_en';
                } else {
                    $this->questionTypes[] = $this->testType;
                }

                $this->currentQuestionIndex++;
                if ($this->listeningMode) $this->wordHidden = true;
            } else {
                $this->examFinished = true;
            }
        }
    }

    public function toggleTestType()
    {
        if (!$this->mixedMode && !$this->listeningMode) {
            $this->testType = $this->testType == 'en_to_zh' ? 'zh_to_en' : 'en_to_zh';
        }
    }

    public function toggleMixedMode()
    {
        if (!$this->listeningMode) $this->mixedMode = !$this->mixedMode;
    }

    public function getCurrentQuestionType()
    {
        if (($this->mixedMode || $this->listeningMode || $this->srsMode) && isset($this->questionTypes[$this->currentQuestionIndex])) {
            return $this->questionTypes[$this->currentQuestionIndex];
        }
        return $this->testType;
    }

    public function resetExam()
    {
        $this->examStarted         = false;
        $this->examFinished        = false;
        $this->questions           = [];
        $this->questionTypes       = [];
        $this->currentQuestionIndex = 0;
        $this->userAnswer          = '';
        $this->answerResult        = null;
        $this->correctAnswer       = '';
        $this->correctCount        = 0;
        $this->incorrectCount      = 0;
        $this->answeredQuestions   = [];
        $this->wordHidden          = false;
        $this->infiniteMode        = ($this->questionCount == 0);
    }

    public function backToSetup()  { $this->resetExam(); }
    public function restartExam()  { $this->startExam(); }

    public function getLanguageDisplayName($languageType)
    {
        return [
            'english'    => '英語',
            'japanese'   => '日語',
            'korean'     => '韓語',
            'spanish'    => '西班牙語',
            'french'     => '法語',
            'german'     => '德語',
            'italian'    => '義大利語',
            'portuguese' => '葡萄牙語',
            'russian'    => '俄語',
            'arabic'     => '阿拉伯語',
        ][$languageType] ?? ucfirst($languageType);
    }

    public function render()
    {
        return view('livewire.exam-component');
    }
}
