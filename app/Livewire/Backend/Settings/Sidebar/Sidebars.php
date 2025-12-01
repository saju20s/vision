<?php

namespace App\Livewire\Backend\Settings\Sidebar;

use App\Models\Sidebar;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class Sidebars extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $title, $link, $phone, $bg_one, $bg_two, $email, $image;
    public $bgColor1 = '#16A085';
    public $bgColor2 = '#980606';
    public $deleteId;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $sidebar = Sidebar::findOrFail($this->deleteId);

        // Optional: delete image file if needed
        if ($sidebar->image && file_exists(public_path('storage/' . $sidebar->image))) {
            unlink(public_path('storage/' . $sidebar->image));
        }


        $sidebar->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Sidebar deleted successfully.');
    }

    public function setBgColor1()
    {
        $this->bg_one = $this->bgColor1;
    }

    public function setBgColor2()
    {
        $this->bg_two = $this->bgColor2;
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'link' => 'required|url|max:255',
        'phone' => 'required|string|max:255',
        'bg_one' => 'required|string|max:255',
        'bg_two' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:1024',
    ];


    public function store()
    {
        try {
            // Validate data
            $this->validate();

            $imageName = $this->image->store('settings', 'public');

            // Create page
            Sidebar::create([
                'title' => $this->title,
                'link' => $this->link,
                'phone' => $this->phone,
                'bg_one' => $this->bg_one,
                'bg_two' => $this->bg_two,
                'email' => $this->email,
                'image' => $imageName,
            ]);


            // Reset form inputs
            $this->reset();

            $this->dispatch('toastr:success', message: 'Sidebar created successfully.');
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
        $sidebars = Sidebar::latest()->paginate(10);

        return view('livewire.backend.settings.sidebar.sidebars', [
            'datas' => $sidebars,
        ])->layout('backend.template.body');
    }
}
