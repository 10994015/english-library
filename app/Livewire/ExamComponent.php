<?php

namespace App\Livewire;

use App\Models\Vocabulary;
use Livewire\Component;

class ExamComponent extends Component
{
    // 測驗設定
    public $questionCount = 10; // 預設題數
    public $allowRepeat = false; // 是否允許重複
    public $examStarted = false; // 測驗是否開始
    public $examFinished = false; // 測驗是否結束

    // 題目資料
    public $allVocabularies = []; // 所有可用詞彙
    public $questions = []; // 當前測驗題目
    public $currentQuestionIndex = 0; // 當前題目索引
    public $questionTypes = []; // 每個題目的類型 (en_to_zh 或 zh_to_en)

    // 用戶回答
    public $userAnswer = ''; // 用戶當前輸入的答案
    public $answerResult = null; // 當前題目的回答結果 (true/false/null)
    public $correctAnswer = ''; // 正確答案 (用於顯示)

    // 測驗結果
    public $correctCount = 0; // 答對題數
    public $incorrectCount = 0; // 答錯題數
    public $answeredQuestions = []; // 已回答的題目記錄 (用於顯示結果)

    // 測驗類型
    public $testType = 'en_to_zh'; // 預設從英文到中文
    public $mixedMode = false; // 是否啟用混合模式

    // 篩選設定
    public $importanceFilter = 'all'; // 重點題目篩選: all, important, not_important
    public $selectedLanguage = 'all'; // 語言篩選: all, english, japanese, korean 等
    public $availableLanguages = []; // 可用的語言列表

    // 題目範圍篩選
    public $questionRangeStart = null; // 起始題號
    public $questionRangeEnd = null;   // 結束題號

    // 無限模式和聽力模式
    public $infiniteMode = false; // 無限模式
    public $listeningMode = false; // 聽力模式
    public $wordHidden = false; // 當前單字是否隱藏

    public function mount()
    {
        // 載入所有詞彙和語言
        $this->loadVocabularies();
        $this->loadAvailableLanguages();
        // 初始化無限模式狀態
        $this->infiniteMode = ($this->questionCount == 0);
    }

    // 載入詞彙庫
    private function loadVocabularies()
    {
        $userId = auth()->id();
        $query = Vocabulary::where('user_id', $userId);

        // 根據重點篩選
        if ($this->importanceFilter === 'important') {
            $query->where('is_important', true);
        } elseif ($this->importanceFilter === 'not_important') {
            $query->where('is_important', false);
        }

        // 根據語言篩選
        if ($this->selectedLanguage !== 'all') {
            $query->where('language_type', $this->selectedLanguage);
        }

        // 按 ID 排序以確保順序一致性
        $query->orderBy('id', 'asc');

        // 應用題目範圍篩選
        if ($this->questionRangeStart || $this->questionRangeEnd) {
            $offset = 0;
            $limit = null;

            if ($this->questionRangeStart && $this->questionRangeEnd) {
                // 兩個都有設定
                $offset = max(0, $this->questionRangeStart - 1); // 轉換為 0-based index
                $limit = $this->questionRangeEnd - $this->questionRangeStart + 1;
            } elseif ($this->questionRangeStart) {
                // 只有起始題號
                $offset = max(0, $this->questionRangeStart - 1);
                // 不設定 limit，取到最後
            } elseif ($this->questionRangeEnd) {
                // 只有結束題號
                $offset = 0;
                $limit = $this->questionRangeEnd;
            }

            $query->skip($offset);
            if ($limit !== null) {
                $query->take($limit);
            }
        }

        $this->allVocabularies = $query->get()->toArray();
    }

    // 載入可用語言列表
    private function loadAvailableLanguages()
    {
        $userId = auth()->id();
        $languages = Vocabulary::where('user_id', $userId)
            ->select('language_type')
            ->distinct()
            ->pluck('language_type')
            ->toArray();

        $this->availableLanguages = $languages;
    }

    // 當篩選條件改變時重新載入詞彙
    public function updatedImportanceFilter()
    {
        $this->loadVocabularies();
        // 重置測驗狀態避免按鈕失效
        if ($this->examStarted) {
            $this->resetExam();
        }
    }

    public function updatedSelectedLanguage()
    {
        $this->loadVocabularies();
        // 重置測驗狀態避免按鈕失效
        if ($this->examStarted) {
            $this->resetExam();
        }
    }

    // 當範圍篩選條件改變時重新載入詞彙
    public function updatedQuestionRangeStart()
    {
        // 驗證起始題號
        if ($this->questionRangeStart !== null && $this->questionRangeStart < 1) {
            $this->questionRangeStart = 1;
        }

        // 如果起始題號大於結束題號，自動調整結束題號
        if ($this->questionRangeStart && $this->questionRangeEnd && $this->questionRangeStart > $this->questionRangeEnd) {
            $this->questionRangeEnd = $this->questionRangeStart;
        }

        $this->loadVocabularies();

        // 重置測驗狀態避免按鈕失效
        if ($this->examStarted) {
            $this->resetExam();
        }
    }

    public function updatedQuestionRangeEnd()
    {
        // 驗證結束題號
        if ($this->questionRangeEnd !== null && $this->questionRangeEnd < 1) {
            $this->questionRangeEnd = 1;
        }

        // 如果結束題號小於起始題號，自動調整起始題號
        if ($this->questionRangeStart && $this->questionRangeEnd && $this->questionRangeEnd < $this->questionRangeStart) {
            $this->questionRangeStart = $this->questionRangeEnd;
        }

        $this->loadVocabularies();

        // 重置測驗狀態避免按鈕失效
        if ($this->examStarted) {
            $this->resetExam();
        }
    }

    // 清除題目範圍設定
    public function clearQuestionRange()
    {
        $this->questionRangeStart = null;
        $this->questionRangeEnd = null;
        $this->loadVocabularies();

        // 重置測驗狀態避免按鈕失效
        if ($this->examStarted) {
            $this->resetExam();
        }
    }

    // 當題數改變時更新無限模式狀態
    public function updatedQuestionCount()
    {
        $this->infiniteMode = ($this->questionCount == 0);
    }

    // 切換聽力模式
    public function toggleListeningMode()
    {
        $this->listeningMode = !$this->listeningMode;
        // 如果開啟聽力模式，強制設定為英翻中模式
        if ($this->listeningMode) {
            $this->testType = 'en_to_zh';
            $this->mixedMode = false;
        }
    }

    // 切換單字顯示/隱藏
    public function toggleWordVisibility()
    {
        $this->wordHidden = !$this->wordHidden;
    }

    // 開始測驗
    public function startExam()
    {
        // 重設測驗狀態
        $this->resetExam();

        // 檢查詞彙數量是否足夠
        if (count($this->allVocabularies) == 0) {
            $filterMessage = $this->getFilterMessage();
            session()->flash('error', "根據目前的篩選條件({$filterMessage})，沒有找到可用的詞彙，請調整篩選條件或新增詞彙！");
            return;
        }

        // 驗證範圍設定的合理性
        if ($this->questionRangeStart && $this->questionRangeEnd && $this->questionRangeStart > $this->questionRangeEnd) {
            session()->flash('error', "起始題號不能大於結束題號，請檢查範圍設定！");
            return;
        }

        // 如果選擇不重複，但詞彙數量不足
        if (!$this->allowRepeat && count($this->allVocabularies) < $this->questionCount && $this->questionCount != 0) {
            $filterMessage = $this->getFilterMessage();
            session()->flash('error', "根據目前的篩選條件({$filterMessage})，只有 " . count($this->allVocabularies) . " 個詞彙，不足以進行 " . $this->questionCount . " 題的不重複測驗！");
            return;
        }

        // 準備題目
        $this->prepareQuestions();

        // 開始測驗
        $this->examStarted = true;

        // 如果是聽力模式，預設隱藏單字
        if ($this->listeningMode) {
            $this->wordHidden = true;
        }
    }

    // 獲取篩選條件描述
    private function getFilterMessage()
    {
        $messages = [];

        if ($this->importanceFilter === 'important') {
            $messages[] = '重點詞彙';
        } elseif ($this->importanceFilter === 'not_important') {
            $messages[] = '非重點詞彙';
        } else {
            $messages[] = '全部詞彙';
        }

        if ($this->selectedLanguage !== 'all') {
            $languageNames = [
                'english' => '英語',
                'japanese' => '日語',
                'korean' => '韓語',
                'spanish' => '西班牙語',
                'french' => '法語',
                'german' => '德語'
            ];
            $languageName = $languageNames[$this->selectedLanguage] ?? $this->selectedLanguage;
            $messages[] = $languageName;
        }

        // 添加範圍信息
        if ($this->questionRangeStart || $this->questionRangeEnd) {
            if ($this->questionRangeStart && $this->questionRangeEnd) {
                $messages[] = "第{$this->questionRangeStart}-{$this->questionRangeEnd}題";
            } elseif ($this->questionRangeStart) {
                $messages[] = "從第{$this->questionRangeStart}題開始";
            } elseif ($this->questionRangeEnd) {
                $messages[] = "到第{$this->questionRangeEnd}題";
            }
        }

        return implode(' + ', $messages);
    }

    // 準備測驗題目
    private function prepareQuestions()
    {
        // 複製所有詞彙以便隨機選擇
        $availableVocabularies = $this->allVocabularies;
        $this->questions = [];
        $this->questionTypes = [];

        // 無限模式下，設定題數為詞彙量 (允許重複) 或詞彙量 (不允許重複)
        $questionCount = $this->infiniteMode
            ? ($this->allowRepeat ? 100 : count($availableVocabularies))
            : $this->questionCount;

        // 選擇題目
        for ($i = 0; $i < $questionCount; $i++) {
            // 如果允許重複或還有可用詞彙
            if ($this->allowRepeat || count($availableVocabularies) > 0) {
                if ($this->allowRepeat) {
                    // 如果允許重複，則從所有詞彙中隨機選擇
                    $randomIndex = array_rand($this->allVocabularies);
                    $vocabulary = $this->allVocabularies[$randomIndex];
                } else {
                    // 如果不允許重複，則從剩餘詞彙中隨機選擇並移除
                    $randomIndex = array_rand($availableVocabularies);
                    $vocabulary = $availableVocabularies[$randomIndex];
                    unset($availableVocabularies[$randomIndex]);
                    $availableVocabularies = array_values($availableVocabularies); // 重置索引
                }

                $this->questions[] = $vocabulary;

                // 對於混合模式，為每個問題隨機分配測驗類型
                // 聽力模式下強制使用英翻中
                if ($this->listeningMode) {
                    $this->questionTypes[] = 'en_to_zh';
                } elseif ($this->mixedMode) {
                    $this->questionTypes[] = (mt_rand(0, 1) == 0) ? 'en_to_zh' : 'zh_to_en';
                } else {
                    $this->questionTypes[] = $this->testType;
                }
            } else {
                // 如果不允許重複且詞彙已用完，則結束
                break;
            }
        }
    }

    // 檢查答案
    public function checkAnswer()
    {
        if (empty($this->userAnswer)) {
            return; // 不做任何處理，如果答案為空
        }

        $currentQuestion = $this->questions[$this->currentQuestionIndex];
        $currentType = ($this->listeningMode || $this->mixedMode) ? $this->questionTypes[$this->currentQuestionIndex] : $this->testType;

        // 根據當前題目類型判斷正確答案
        if ($currentType == 'en_to_zh') {
            $this->correctAnswer = $currentQuestion['chinese_word'];
            $this->answerResult = mb_strtolower(trim($this->userAnswer)) === mb_strtolower(trim($this->correctAnswer));
        } else {
            $this->correctAnswer = $currentQuestion['english_word'];
            $this->answerResult = mb_strtolower(trim($this->userAnswer)) === mb_strtolower(trim($this->correctAnswer));
        }

        // 更新計數
        if ($this->answerResult) {
            $this->correctCount++;
        } else {
            $this->incorrectCount++;
        }

        // 記錄已回答的題目
        $this->answeredQuestions[] = [
            'question' => $currentType == 'en_to_zh' ? $currentQuestion['english_word'] : $currentQuestion['chinese_word'],
            'correctAnswer' => $this->correctAnswer,
            'userAnswer' => $this->userAnswer,
            'isCorrect' => $this->answerResult,
            'part_of_speech' => $currentQuestion['part_of_speech'],
            'type' => $currentType, // 記錄題目類型
            'is_important' => $currentQuestion['is_important'] ?? false, // 記錄是否為重點
            'language_type' => $currentQuestion['language_type'] ?? 'english', // 記錄語言類型
            'was_listening_mode' => $this->listeningMode // 記錄是否為聽力模式
        ];

        // 答題後在聽力模式下顯示單字
        if ($this->listeningMode) {
            $this->wordHidden = false;
        }
    }

    // 下一題
    public function nextQuestion()
    {
        $this->userAnswer = '';
        $this->answerResult = null;

        // 檢查是否還有下一題
        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
            // 如果是聽力模式，新題目預設隱藏單字
            if ($this->listeningMode) {
                $this->wordHidden = true;
            }
        } else {
            // 如果無限模式且允許重複，添加新題目
            if ($this->infiniteMode && $this->allowRepeat && count($this->allVocabularies) > 0) {
                $randomIndex = array_rand($this->allVocabularies);
                $this->questions[] = $this->allVocabularies[$randomIndex];

                // 為新題目分配類型
                if ($this->listeningMode) {
                    $this->questionTypes[] = 'en_to_zh';
                } elseif ($this->mixedMode) {
                    $this->questionTypes[] = (mt_rand(0, 1) == 0) ? 'en_to_zh' : 'zh_to_en';
                } else {
                    $this->questionTypes[] = $this->testType;
                }

                $this->currentQuestionIndex++;
                // 如果是聽力模式，新題目預設隱藏單字
                if ($this->listeningMode) {
                    $this->wordHidden = true;
                }
            } else {
                // 測驗結束
                $this->examFinished = true;
            }
        }
    }

    // 切換測驗類型 (對非混合模式且非聽力模式有效)
    public function toggleTestType()
    {
        if (!$this->mixedMode && !$this->listeningMode) {
            $this->testType = $this->testType == 'en_to_zh' ? 'zh_to_en' : 'en_to_zh';
        }
    }

    // 切換混合模式
    public function toggleMixedMode()
    {
        if (!$this->listeningMode) { // 聽力模式下不允許混合模式
            $this->mixedMode = !$this->mixedMode;
        }
    }

    // 獲取當前問題的類型
    public function getCurrentQuestionType()
    {
        if (($this->mixedMode || $this->listeningMode) && isset($this->questionTypes[$this->currentQuestionIndex])) {
            return $this->questionTypes[$this->currentQuestionIndex];
        }
        return $this->testType;
    }

    // 重設測驗
    public function resetExam()
    {
        $this->examStarted = false;
        $this->examFinished = false;
        $this->questions = [];
        $this->questionTypes = [];
        $this->currentQuestionIndex = 0;
        $this->userAnswer = '';
        $this->answerResult = null;
        $this->correctAnswer = '';
        $this->correctCount = 0;
        $this->incorrectCount = 0;
        $this->answeredQuestions = [];
        $this->wordHidden = false; // 重設單字顯示狀態
        // 重設時保持無限模式狀態與題數一致
        $this->infiniteMode = ($this->questionCount == 0);

        // 注意：這裡不重置範圍篩選，因為用戶可能想要繼續使用相同的範圍
    }

    // 完全重置（包括範圍篩選）
    public function fullReset()
    {
        $this->resetExam();
        $this->questionRangeStart = null;
        $this->questionRangeEnd = null;
        $this->loadVocabularies();
    }

    // 返回設定頁
    public function backToSetup()
    {
        $this->resetExam();
    }

    // 重新測驗
    public function restartExam()
    {
        $this->startExam();
    }

    // 獲取總詞彙數量（不受範圍篩選影響，用於顯示完整統計）
    public function getTotalVocabularyCount()
    {
        $userId = auth()->id();
        $query = Vocabulary::where('user_id', $userId);

        // 只應用重點和語言篩選，不應用範圍篩選
        if ($this->importanceFilter === 'important') {
            $query->where('is_important', true);
        } elseif ($this->importanceFilter === 'not_important') {
            $query->where('is_important', false);
        }

        if ($this->selectedLanguage !== 'all') {
            $query->where('language_type', $this->selectedLanguage);
        }

        return $query->count();
    }

    // 獲取語言顯示名稱
    public function getLanguageDisplayName($languageType)
    {
        $languageNames = [
            'english' => '英語',
            'japanese' => '日語',
            'korean' => '韓語',
            'spanish' => '西班牙語',
            'french' => '法語',
            'german' => '德語',
            'italian' => '義大利語',
            'portuguese' => '葡萄牙語',
            'russian' => '俄語',
            'arabic' => '阿拉伯語'
        ];

        return $languageNames[$languageType] ?? ucfirst($languageType);
    }

    public function render()
    {
        return view('livewire.exam-component');
    }
}
