<?php

namespace App\Livewire\Backend\Messages;

use App\Models\Message;
use Livewire\Component;
use App\Models\MessageReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMessage as MailReplyMessage;

class ReplyMessage extends Component
{
    public $messageId;
    public $originalMessage; // renamed from message
    public $reply_message;

    public function mount($id)
    {
        $message = Message::findOrFail($id);

        $this->messageId = $message->id;
        $this->originalMessage = $message->message;
    }

    public function store()
    {
        $this->validate([
            'reply_message' => 'required|string',
        ]);

        MessageReply::create([
            'message_id' => $this->messageId,
            'user_id' => Auth::id(),
            'reply' => $this->reply_message,
        ]);

        $this->reply_message = '';

        $message = Message::with('replies.user')->findOrFail($this->messageId);

        // ইমেইল পাঠানো
        Mail::to($message->email)->send(new MailReplyMessage($message));


        $this->dispatch('toastr:success', message: 'Reply sent successfully.');
    }

    public function render()
    {
        $message = Message::with('replies.user')->findOrFail($this->messageId);

        return view('livewire.backend.messages.reply-message', [
            'message' => $message, // this is Eloquent model
            'replies' => $message->replies,
        ])->layout('backend.template.body');
    }
}
