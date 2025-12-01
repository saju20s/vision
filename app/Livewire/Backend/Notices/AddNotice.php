<?php

namespace App\Livewire\Backend\Notices;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddNotice extends Component
{
    use WithFileUploads;

    public $title;
    public $description = '';
    public $type = 'notice';
    public $authority;
    public $file;

    protected $rules = [
        'title' => 'required|max:255',
        'type' => 'nullable|string',
        'authority' => 'nullable|string|max:100',
        'description' => 'required|string',
        'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf|max:2048',
    ];

    public function store()
    {
        try {
            // Validate input
            $this->validate();

            // Upload image or PDF
            $imageName = null;
            $noticePdfName = null;

            if ($this->file) {
                $extension = strtolower($this->file->getClientOriginalExtension());

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $imageName = $this->file->store('notices', 'public');
                } elseif ($extension === 'pdf') {
                    $noticePdfName = $this->file->store('notices', 'public');
                }
            }

            // Create Notice record
            Notice::create([
                'title' => $this->title,
                'description' => $this->description,
                'type' => $this->type,
                'authority' => $this->authority,
                'image' => $imageName,
                'file' => $noticePdfName,
            ]);

            // Reset form
            $this->reset();

            // Success toastr
            $this->dispatch('toastr:success', message: 'Notice created successfully.');
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
        return view('livewire.backend.notices.add-notice')->layout('backend.template.body');
    }
}
