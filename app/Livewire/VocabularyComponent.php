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

    // 確認刪除的 ID
    public $confirmingDelete = null;

    public function confirmDelete($id)
    {
        $this->confirmingDelete = $id;
    }

    public function delete()
    {
        Vocabulary::destroy($this->confirmingDelete);
        $this->confirmingDelete = null;
        session()->flash('message', '詞彙已成功刪除！');
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = null;
    }

    public function render()
    {
        $userId = auth()->id();

        $vocabularies = Vocabulary::where('user_id', $userId)
            ->when($this->search, function($query) {
                $query->where('english_word', 'like', '%' . $this->search . '%')
                    ->orWhere('chinese_word', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.vocabulary-component', [
            'vocabularies' => $vocabularies
        ]);
    }

}
