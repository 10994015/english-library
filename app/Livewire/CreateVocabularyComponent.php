<?php

namespace App\Livewire;

use App\Models\Vocabulary;
use Livewire\Component;

class CreateVocabularyComponent extends Component
{
    public $vocabulary_id = null;
    public $english_word = '';
    public $chinese_word = '';
    public $part_of_speech = '';
    public $example_sentence = '';
    public $example_sentence_translation = '';

    // 設置編輯模式的標誌
    public $isEditing = false;

    // 添加頁面標題文字變數
    public $pageTitle = '新增詞彙';
    public $buttonText = '儲存詞彙';

    protected $rules = [
        'english_word' => 'required|string|max:255',
        'chinese_word' => 'required|string|max:255',
        'part_of_speech' => 'nullable|string|max:255',
        'example_sentence' => 'nullable|string|max:255',
        'example_sentence_translation' => 'nullable|string|max:255',
    ];

    // 接收 URL 參數，決定是新增或編輯模式
    public function mount($id = null)
    {
        if ($id) {
            $this->vocabulary_id = $id;
            $this->isEditing = true;
            $this->pageTitle = '編輯詞彙';
            $this->buttonText = '更新詞彙';

            // 載入詞彙資料
            $vocabulary = Vocabulary::findOrFail($id);
            $this->english_word = $vocabulary->english_word;
            $this->chinese_word = $vocabulary->chinese_word;
            $this->part_of_speech = $vocabulary->part_of_speech;
            $this->example_sentence = $vocabulary->example_sentence;
            $this->example_sentence_translation = $vocabulary->example_sentence_translation;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        // 取得當前登入用戶的 ID
        $userId = auth()->id();

        if ($this->isEditing) {
            // 編輯模式 - 更新現有記錄
            $vocabulary = Vocabulary::find($this->vocabulary_id);

            // 確認當前用戶有權限編輯此詞彙（可選但建議加上）
            if ($vocabulary->user_id !== $userId) {
                session()->flash('error', '您沒有權限編輯此詞彙！');
                return;
            }

            $vocabulary->update([
                'english_word' => $this->english_word,
                'chinese_word' => $this->chinese_word,
                'part_of_speech' => $this->part_of_speech,
                'example_sentence' => $this->example_sentence,
                'example_sentence_translation' => $this->example_sentence_translation,
            ]);

            session()->flash('message', '詞彙已成功更新！');

            // 可選：編輯後重定向回列表頁面
            // return redirect()->route('vocabulary.index');
        } else {
            // 新增模式 - 創建新記錄
            Vocabulary::create([
                'english_word' => $this->english_word,
                'chinese_word' => $this->chinese_word,
                'part_of_speech' => $this->part_of_speech,
                'example_sentence' => $this->example_sentence,
                'example_sentence_translation' => $this->example_sentence_translation,
                'user_id' => $userId, // 添加用戶 ID
            ]);

            $this->reset(['english_word', 'chinese_word', 'part_of_speech', 'example_sentence', 'example_sentence_translation']);

            session()->flash('message', '詞彙已成功添加！');
        }
    }

    // 返回列表頁
    public function backToList()
    {
        return redirect()->route('vocabulary.index');
    }

    public function render()
    {
        return view('livewire.create-vocabulary-component');
    }
}
