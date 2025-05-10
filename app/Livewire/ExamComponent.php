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

    public function mount()
    {
        // 載入所有詞彙
        $this->loadVocabularies();
    }

    // 載入詞彙庫
    private function loadVocabularies()
    {
        $userId = auth()->id();
        $this->allVocabularies = Vocabulary::where('user_id', $userId)->get()->toArray();
    }

    // 開始測驗
    public function startExam()
    {
        // 重設測驗狀態
        $this->resetExam();

        // 檢查詞彙數量是否足夠
        if (count($this->allVocabularies) == 0) {
            session()->flash('error', '詞彙庫中沒有可用的詞彙，請先新增一些詞彙！');
            return;
        }

        // 如果選擇不重複，但詞彙數量不足
        if (!$this->allowRepeat && count($this->allVocabularies) < $this->questionCount && $this->questionCount != 0) {
            session()->flash('error', '詞彙庫中只有 ' . count($this->allVocabularies) . ' 個詞彙，不足以進行 ' . $this->questionCount . ' 題的不重複測驗！');
            return;
        }

        // 準備題目
        $this->prepareQuestions();

        // 開始測驗
        $this->examStarted = true;
    }

    // 準備測驗題目
    private function prepareQuestions()
    {
        // 複製所有詞彙以便隨機選擇
        $availableVocabularies = $this->allVocabularies;
        $this->questions = [];
        $this->questionTypes = [];

        // 無限模式下，設定題數為詞彙量 (允許重複) 或詞彙量 (不允許重複)
        $questionCount = $this->questionCount == 0
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
                if ($this->mixedMode) {
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
        $currentType = $this->mixedMode ? $this->questionTypes[$this->currentQuestionIndex] : $this->testType;

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
            'type' => $currentType // 記錄題目類型
        ];
    }

    // 下一題
    public function nextQuestion()
    {
        $this->userAnswer = '';
        $this->answerResult = null;

        // 檢查是否還有下一題
        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
        } else {
            // 如果無限模式且允許重複，添加新題目
            if ($this->questionCount == 0 && $this->allowRepeat) {
                $randomIndex = array_rand($this->allVocabularies);
                $this->questions[] = $this->allVocabularies[$randomIndex];

                // 為新題目分配類型
                if ($this->mixedMode) {
                    $this->questionTypes[] = (mt_rand(0, 1) == 0) ? 'en_to_zh' : 'zh_to_en';
                } else {
                    $this->questionTypes[] = $this->testType;
                }

                $this->currentQuestionIndex++;
            } else {
                // 測驗結束
                $this->examFinished = true;
            }
        }
    }

    // 切換測驗類型 (對非混合模式有效)
    public function toggleTestType()
    {
        if (!$this->mixedMode) {
            $this->testType = $this->testType == 'en_to_zh' ? 'zh_to_en' : 'en_to_zh';
        }
    }

    // 切換混合模式
    public function toggleMixedMode()
    {
        $this->mixedMode = !$this->mixedMode;
    }

    // 獲取當前問題的類型
    public function getCurrentQuestionType()
    {
        if ($this->mixedMode && isset($this->questionTypes[$this->currentQuestionIndex])) {
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

    public function render()
    {
        return view('livewire.exam-component');
    }
}
