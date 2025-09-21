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

    // 確認刪除的 ID 和詞彙資訊
    public $confirmingDelete = null;
    public $deletingVocabulary = null;

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
            ->orderBy('created_at', 'desc')
            ->paginate(10);

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
