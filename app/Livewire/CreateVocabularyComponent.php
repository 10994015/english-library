<?php

namespace App\Livewire;

use App\Models\Vocabulary;
use Livewire\Component;

class CreateVocabularyComponent extends Component
{
    public $vocabulary_id = null;
    public $english_word = '';
    public $chinese_words = [''];   // 改為陣列，支援多個意思
    public $part_of_speech = '';
    public $example_sentence = '';
    public $example_sentence_translation = '';
    public $is_important = false;
    public $language_type = 'english';

    public $isEditing = false;
    public $pageTitle = '新增詞彙';
    public $buttonText = '儲存詞彙';

    protected function rules()
    {
        return [
            'english_word'                  => 'required|string|max:255',
            'chinese_words'                 => 'required|array|min:1',
            'chinese_words.*'               => 'required|string|max:255',
            'part_of_speech'                => 'nullable|string|max:255',
            'example_sentence'              => 'nullable|string|max:255',
            'example_sentence_translation'  => 'nullable|string|max:255',
            'is_important'                  => 'boolean',
            'language_type'                 => 'required|string|in:english,japanese',
        ];
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->vocabulary_id = $id;
            $this->isEditing     = true;
            $this->pageTitle     = '編輯詞彙';
            $this->buttonText    = '更新詞彙';

            $vocabulary = Vocabulary::findOrFail($id);
            $this->english_word                 = $vocabulary->english_word;
            $this->chinese_words                = $vocabulary->chinese_word; // 已是陣列
            $this->part_of_speech               = $vocabulary->part_of_speech;
            $this->example_sentence             = $vocabulary->example_sentence;
            $this->example_sentence_translation = $vocabulary->example_sentence_translation;
            $this->is_important                 = $vocabulary->is_important ?? false;
            $this->language_type                = $vocabulary->language_type ?? 'english';
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // 新增一個空的意思欄位
    public function addMeaning()
    {
        $this->chinese_words[] = '';
    }

    // 移除指定索引的意思欄位（至少保留一個）
    public function removeMeaning($index)
    {
        if (count($this->chinese_words) > 1) {
            array_splice($this->chinese_words, $index, 1);
            $this->chinese_words = array_values($this->chinese_words);
        }
    }

    public function save()
    {
        $this->validate();

        // 過濾掉空白值
        $meanings = array_values(array_filter(
            array_map('trim', $this->chinese_words),
            fn($v) => $v !== ''
        ));

        if (empty($meanings)) {
            $this->addError('chinese_words.0', '請至少輸入一個中文意思');
            return;
        }

        $userId = auth()->id();

        $data = [
            'english_word'                  => $this->english_word,
            'chinese_word'                  => $meanings,   // 存陣列，Model cast 會處理 JSON
            'part_of_speech'                => $this->part_of_speech,
            'example_sentence'              => $this->example_sentence,
            'example_sentence_translation'  => $this->example_sentence_translation,
            'is_important'                  => $this->is_important,
            'language_type'                 => $this->language_type,
        ];

        if ($this->isEditing) {
            $vocabulary = Vocabulary::find($this->vocabulary_id);

            if ($vocabulary->user_id !== $userId) {
                session()->flash('error', '您沒有權限編輯此詞彙！');
                return;
            }

            $vocabulary->update($data);
            session()->flash('message', '詞彙已成功更新！');
        } else {
            Vocabulary::create(array_merge($data, ['user_id' => $userId]));
            session()->flash('message', '詞彙已成功添加！');
        }
    }

    public function render()
    {
        return view('livewire.create-vocabulary-component');
    }
}
