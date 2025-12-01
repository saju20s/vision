<?php

namespace App\Livewire\Backend\Expenses;

use App\Models\Expense;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\ExpenseCategory;
use App\Models\Expensehistory;
use Illuminate\Validation\ValidationException;

class AddExpense extends Component
{

    public $name;
    public $amount;
    public $expense_category_id;
    public $date;
    public $note;

    public function mount()
    {
        $this->date = now()->format('Y-m-d'); // আজকের তারিখ set
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'expense_category_id' => 'required|exists:expense_categories,id',
        'amount' => 'required|numeric|min:0',
        'date' => 'required|date',
        'note' => 'nullable|string',
    ];


    public function store()
    {
        try {
            // Validate inputs
            $validated = $this->validate();


            $bdTime = Carbon::now();
            // Save blog
            $expenses = Expense::create([
                'name' => $this->name,
                'expense_category_id' => $this->expense_category_id,
                'amount' => $this->amount,
                'entry_by' => auth()->user()->name,
                'date' => $this->date,
                'note' => $this->note,
            ]);

            Expensehistory::create([
                'expense_id'        => $expenses->id,
                'name'              => $expenses->name,
                'entry_by'          => $expenses->entry_by,
                'expense_category_id'  => $expenses->expense_category_id,
                'amount'            => $expenses->amount,
                'date'              => $expenses->date,
                'note'              => $expenses->note,
                'created_at'        => $bdTime,
                'updated_at'        => $bdTime,
            ]);



            $this->reset();

            $this->dispatch('toastr:success', message: 'Expense created successfully.');
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
        return view('livewire.backend.expenses.add-expense', [
            'categories' => $categories
        ])->layout('backend.template.body');
    }
}
