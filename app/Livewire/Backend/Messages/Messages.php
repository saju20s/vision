<?php

namespace App\Livewire\Backend\Messages;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Messages extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $filter = 'all';

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {

        $message = Message::findOrFail($this->deleteId);
        $message->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Message deleted successfully.');
    }

    public function formatCount($count)
    {
        if ($count >= 1000000) {
            return number_format($count / 1000000, 1) . 'M';
        } elseif ($count >= 1000) {
            return number_format($count / 1000, 1) . 'K';
        } else {
            return $count;
        }
    }

    public function render()
    {
        $query = Message::withCount('replies');

        if ($this->filter === 'replied') {
            $query->has('replies');
        } elseif ($this->filter === 'noreply') {
            $query->doesntHave('replies');
        }

        $messages = $query->latest()->paginate(10);

        $messages->getCollection()->transform(function ($message) {
            $message->short_message = Str::words($message->message, 20);
            return $message;
        });

        return view('livewire.backend.messages.messages', [
            'datas' => $messages,
            'all_count' => $this->formatCount(Message::count()),
            'replied_count' => $this->formatCount(Message::has('replies')->count()),
            'noreply_count' => $this->formatCount(Message::doesntHave('replies')->count()),
        ])->layout('backend.template.body');
    }
}
