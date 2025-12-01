<?php

namespace App\Livewire\Backend\Expenses;

use App\Models\ExpenseCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\ValidationException;

class AllExpenseCategory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';

    // Add/Edit Modal variables
    public $categoryId;
    public $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:expense_categories,name,' . $this->categoryId,
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // ✅ Open Add Modal
    public function openAddModal()
    {
        $this->resetForm();
        $this->dispatch('openModal', id: 'categoryModal');
    }

    // ✅ Open Edit Modal
    public function openEditModal($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;

        $this->dispatch('openModal', id: 'categoryModal');
    }

    // ✅ Save or Update Category
    public function saveCategory()
    {
        try {
            $this->validate();

            ExpenseCategory::updateOrCreate(
                ['id' => $this->categoryId],
                ['name' => $this->name]
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
        $category = ExpenseCategory::findOrFail($this->deleteId);
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
    }

    public function render()
    {
        $categories = ExpenseCategory::query()
            ->when(
                $this->search,
                fn($query) => $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(20);

        return view('livewire.backend.expenses.all-expense-category', [
            'datas' => $categories
        ])->layout('backend.template.body');
    }
}
