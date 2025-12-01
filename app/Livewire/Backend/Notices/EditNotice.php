<?php

namespace App\Livewire\Backend\Notices;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditNotice extends Component
{
    use WithFileUploads;

    public $noticeId;
    public $title;
    public $description = '';
    public $type = 'notice';
    public $authority;
    public $file;
    public $existingImage;
    public $existingFile;
    

    public function mount($id)
    {
        $notice = Notice::findOrFail($id);
        $this->noticeId = $notice->id;
        $this->title = $notice->title;
        $this->description = $notice->description;
        $this->type = $notice->type;
        $this->authority = $notice->authority;
        $this->existingImage = $notice->image;
        $this->existingFile = $notice->file;
    }

    public function update()
    {
        try {
            $this->validate([
                'title' => 'required|max:255',
                'type' => 'nullable|string',
                'authority' => 'nullable|string|max:100',
                'description' => 'required|string',
                'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,pdf|max:2048',
            ]);

            $notice = Notice::findOrFail($this->noticeId);

            if ($this->file) {
                // Delete old image
                if ($this->existingImage && file_exists(public_path('storage/' . $this->existingImage))) {
                    @unlink(public_path('storage/' . $this->existingImage));
                }

                // Delete old PDF
                if ($this->existingFile && file_exists(public_path('storage/' . $this->existingFile))) {
                    @unlink(public_path('storage/' . $this->existingFile));
                }

                $extension = strtolower($this->file->getClientOriginalExtension());

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $imageName = $this->file->store('notices', 'public');
                    $notice->image = $imageName;
                    $notice->file = null;
                } elseif ($extension === 'pdf') {
                    $pdfName = $this->file->store('notices', 'public');
                    $notice->file = $pdfName;
                    $notice->image = null;
                }
            }

            $notice->title = $this->title;
            $notice->description = $this->description;
            $notice->type = $this->type;
            $notice->authority = $this->authority;

            $notice->save();

            $this->dispatch('toastr:success', message: 'Notice updated successfully.');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.notices.edit-notice')->layout('backend.template.body');
    }
}
