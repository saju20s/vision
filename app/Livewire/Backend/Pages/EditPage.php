<?php

namespace App\Livewire\Backend\Pages;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditPage extends Component
{
    use WithFileUploads;

    public $pageId;
    public $title;
    public $slug;
    public $description = '';
    public $image;
    public $oldImage;

    public function mount($id)
    {
        $page = Page::findOrFail($id);

        $this->pageId = $page->id;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->description = $page->description;
        $this->oldImage = $page->image;
    }

    public function update()
    {
        try {

            $this->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|max:2048',
            ]);

            $page = Page::findOrFail($this->pageId);

            // Notun image dile puraton ta delete korte hobe
            if ($this->image) {
                // Puraton image er thik path check
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage)); // delete
                }

                // Notun image save
                $imageName = Str::slug($this->title) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('pages', $imageName, 'public');
                $page->image = 'pages/' . $imageName;
            }

            // Onno field gulo update
            $page->title = $this->title;
            $page->slug = $this->slug;
            $page->description = $this->description;
            $page->save();

            // Success message
            $this->dispatch('toastr:success', message: 'Page updated successfully.');
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
        return view('livewire.backend.pages.edit-page')->layout('backend.template.body');
    }
}
