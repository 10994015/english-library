<?php

namespace App\Livewire;

use App\Models\Vocabulary;
use Livewire\Component;
use Livewire\WithPagination;

class VocabularyComponent extends Component
{
    use WithPagination;

    // 搜尋功能
    public $search = '';

    // 語言類型篩選
    public $languageFilter = '';

    // 重點詞彙篩選
    public $importantFilter = '';

    // 排序
    public $sortBy = 'newest';

    // 每頁顯示筆數
    public $perPage = 10;

    // 確認刪除的 ID 和詞彙資訊
    public $confirmingDelete = null;
    public ?Vocabulary $deletingVocabulary = null;

    // 編輯 modal
    public $showEditModal = false;
    public $editingId = null;
    public $editEnglishWord = '';
    public $editChineseWords = [''];
    public $editPartOfSpeech = '';
    public $editExampleSentence = '';
    public $editExampleSentenceTranslation = '';
    public $editIsImportant = false;
    public $editLanguageType = 'english';

    // 重置分頁當搜尋條件改變時
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingLanguageFilter()
    {
        $this->resetPage();
    }

    public function updatingImportantFilter()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    // 切換重點標記
    public function toggleImportant($vocabularyId)
    {
        $vocabulary = Vocabulary::where('id', $vocabularyId)
            ->where('user_id', auth()->id())
            ->first();

        if ($vocabulary) {
            $vocabulary->update([
                'is_important' => !$vocabulary->is_important
            ]);

            $message = $vocabulary->is_important ? '已標記為重點詞彙！' : '已取消重點標記！';
            session()->flash('message', $message);
        }
    }

    // 確認刪除
    public function confirmDelete($id)
    {
        $vocabulary = Vocabulary::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($vocabulary) {
            $this->confirmingDelete = $id;
            $this->deletingVocabulary = $vocabulary;
        }
    }

    // 執行刪除
    public function delete()
    {
        if ($this->confirmingDelete) {
            $vocabulary = Vocabulary::where('id', $this->confirmingDelete)
                ->where('user_id', auth()->id())
                ->first();

            if ($vocabulary) {
                $vocabulary->delete();
                session()->flash('message', '詞彙「' . $vocabulary->english_word . '」已成功刪除！');
            }

            $this->confirmingDelete = null;
            $this->deletingVocabulary = null;
        }
    }

    // 取消刪除
    public function cancelDelete()
    {
        $this->confirmingDelete = null;
        $this->deletingVocabulary = null;
    }

    // 開啟編輯 modal
    public function openEdit($id)
    {
        $vocabulary = Vocabulary::where('id', $id)->where('user_id', auth()->id())->first();
        if (!$vocabulary) return;

        $this->editingId = $id;
        $this->editEnglishWord = $vocabulary->english_word;
        $this->editChineseWords = is_array($vocabulary->chinese_word) ? $vocabulary->chinese_word : [$vocabulary->chinese_word];
        $this->editPartOfSpeech = $vocabulary->part_of_speech ?? '';
        $this->editExampleSentence = $vocabulary->example_sentence ?? '';
        $this->editExampleSentenceTranslation = $vocabulary->example_sentence_translation ?? '';
        $this->editIsImportant = $vocabulary->is_important ?? false;
        $this->editLanguageType = $vocabulary->language_type ?? 'english';
        $this->showEditModal = true;
        $this->resetErrorBag();
    }

    public function closeEdit()
    {
        $this->showEditModal = false;
        $this->editingId = null;
    }

    public function addEditMeaning()
    {
        $this->editChineseWords[] = '';
    }

    public function removeEditMeaning($index)
    {
        if (count($this->editChineseWords) > 1) {
            array_splice($this->editChineseWords, $index, 1);
            $this->editChineseWords = array_values($this->editChineseWords);
        }
    }

    public function saveEdit()
    {
        $this->validate([
            'editEnglishWord'                  => 'required|string|max:255',
            'editChineseWords'                 => 'required|array|min:1',
            'editChineseWords.*'               => 'required|string|max:255',
            'editPartOfSpeech'                 => 'nullable|string|max:255',
            'editExampleSentence'              => 'nullable|string|max:255',
            'editExampleSentenceTranslation'   => 'nullable|string|max:255',
            'editIsImportant'                  => 'boolean',
            'editLanguageType'                 => 'required|string|in:english,japanese',
        ]);

        $meanings = array_values(array_filter(
            array_map('trim', $this->editChineseWords),
            fn($v) => $v !== ''
        ));

        if (empty($meanings)) {
            $this->addError('editChineseWords.0', '請至少輸入一個中文意思');
            return;
        }

        $vocabulary = Vocabulary::where('id', $this->editingId)->where('user_id', auth()->id())->first();
        if (!$vocabulary) return;

        $vocabulary->update([
            'english_word'                  => $this->editEnglishWord,
            'chinese_word'                  => $meanings,
            'part_of_speech'                => $this->editPartOfSpeech ?: null,
            'example_sentence'              => $this->editExampleSentence ?: null,
            'example_sentence_translation'  => $this->editExampleSentenceTranslation ?: null,
            'is_important'                  => $this->editIsImportant,
            'language_type'                 => $this->editLanguageType,
        ]);

        $this->showEditModal = false;
        $this->editingId = null;
        session()->flash('message', '詞彙已成功更新！');
    }

    // 清除所有篩選
    public function clearFilters()
    {
        $this->search = '';
        $this->languageFilter = '';
        $this->importantFilter = '';
        $this->resetPage();
    }

    public function render()
    {
        $userId = auth()->id();

        $vocabularies = Vocabulary::where('user_id', $userId)
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('english_word', 'like', '%' . $this->search . '%')
                      ->orWhere('chinese_word', 'like', '%' . $this->search . '%')
                      ->orWhere('example_sentence', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->languageFilter, function($query) {
                $query->where('language_type', $this->languageFilter);
            })
            ->when($this->importantFilter !== '', function($query) {
                $query->where('is_important', $this->importantFilter === '1');
            })
            ->orderBy('is_important', 'desc') // 重點詞彙排在前面
            ->when($this->sortBy === 'oldest', fn($q) => $q->orderBy('created_at', 'asc'))
            ->when($this->sortBy === 'az', fn($q) => $q->orderBy('english_word', 'asc'))
            ->when($this->sortBy === 'za', fn($q) => $q->orderBy('english_word', 'desc'))
            ->when($this->sortBy === 'newest' || !in_array($this->sortBy, ['oldest','az','za']), fn($q) => $q->orderBy('created_at', 'desc'))
            ->paginate($this->perPage);

        // 統計資料
        $stats = [
            'total' => Vocabulary::where('user_id', $userId)->count(),
            'important' => Vocabulary::where('user_id', $userId)->where('is_important', true)->count(),
            'english' => Vocabulary::where('user_id', $userId)->where('language_type', 'english')->count(),
            'japanese' => Vocabulary::where('user_id', $userId)->where('language_type', 'japanese')->count(),
        ];

        return view('livewire.vocabulary-component', [
            'vocabularies' => $vocabularies,
            'stats' => $stats
        ]);
    }
}
