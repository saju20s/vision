<?php

namespace App\Livewire\Backend\Blogs;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\BolgCategory;
use Livewire\WithPagination;
use Illuminate\Validation\ValidationException;

class AllBlogCategory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';
    public $categoryId;
    public $name;
    public $slug;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:bolg_categories,name,' . $this->categoryId,
            'slug' => 'nullable|string|max:255|unique:bolg_categories,slug,' . $this->categoryId,
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openAddModal()
    {
        $this->resetForm();
        $this->dispatch('openModal', id: 'categoryModal');
    }

    public function openEditModal($id)
    {
        $category = BolgCategory::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;

        $this->dispatch('openModal', id: 'categoryModal');
    }

    // ✅ Save or Update Category
    public function saveCategory()
    {
        try {
            if (!$this->slug) {
                $this->slug = Str::slug($this->name);
            }
            $this->validate();

            BolgCategory::updateOrCreate(
                ['id' => $this->categoryId],
                [
                    'name' => $this->name,
                    'slug' => $this->slug,
                ]
            );

            $this->dispatch('toastr:success', message: $this->categoryId ? 'Category updated successfully.' : 'Category added successfully.');
            $this->dispatch('closeModal', id: 'categoryModal');

            $this->resetForm();
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    // ✅ Confirm delete
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    // ✅ Delete category
    public function delete()
    {
        $category = BolgCategory::findOrFail($this->deleteId);
        $category->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Category deleted successfully.');
        $this->dispatch('closeModal', id: 'deleteModal'); // ✅ modal close
    }

    // ✅ Reset form
    private function resetForm()
    {
        $this->categoryId = null;
        $this->name = '';
        $this->slug = '';
    }


    public function render()
    {
        $categories = BolgCategory::query()
            ->when(
                $this->search,
                fn($query) => $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);
        return view('livewire.backend.blogs.all-blog-category', [
            'datas' => $categories
        ])->layout('backend.template.body');
    }
}
