<?php

namespace App\Livewire\Backend\Expenses;

use App\Models\Expense;
use Livewire\Component;
use App\Models\Expensehistory;
use App\Models\ExpenseCategory;
use Illuminate\Validation\ValidationException;

class EditExpense extends Component
{
    public $expenseId;
    public $name;
    public $amount;
    public $expense_category_id;
    public $date;
    public $note;
    public $old_amount;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'expense_category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ];
    }

    public function mount($id)
    {
        $expense = Expense::findOrFail($id);

        $this->expenseId = $expense->id;
        $this->name = $expense->name;
        $this->amount = $expense->amount;
        $this->old_amount = $expense->amount;
        $this->expense_category_id = $expense->expense_category_id;
        $this->date = $expense->date;
        $this->note = $expense->note;
    }

    public function update()
    {
        try {

            $validated = $this->validate();

            // Get model first
            $expense = Expense::findOrFail($this->expenseId);

            // Update expense
            $expense->update([
                'name' => $this->name,
                'expense_category_id' => $this->expense_category_id,
                'amount' => $this->amount,
                'date' => $this->date,
                'note' => $this->note,
            ]);

            $historyAmount = ($this->amount == $this->old_amount)
                ? 0
                : $this->amount;

            // Save history
            Expensehistory::create([
                'expense_id'        => $expense->id,
                'name'              => $expense->name,
                'entry_by'          => auth()->user()->name ?? 'system',
                'expense_category_id'  => $expense->expense_category_id,
                'amount'            => $historyAmount,
                'date'              => $expense->date,
                'note'              => $expense->note,
            ]);

            $this->dispatch('toastr:success', message: 'Expense updated successfully.');
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
        $categories = ExpenseCategory::latest()->get();

        return view('livewire.backend.expenses.edit-expense', [
            'categories' => $categories
        ])->layout('backend.template.body');
    }
}
