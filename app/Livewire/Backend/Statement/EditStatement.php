<?php

namespace App\Livewire\Backend\Statement;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class EditStatement extends Component
{
    public $statementId;
    public $affidavit_one;
    public $affidavit_two;

    public function mount($id)
    {
        $statement = Setting::findOrFail($id);

        $this->statementId = $statement->id;
        $this->affidavit_one = $statement->affidavit_one;
        $this->affidavit_two = $statement->affidavit_two;
    }

    public function update()
    {
        try {
            $this->validate([
                'affidavit_one' => 'required|string|max:3555',
                'affidavit_two' => 'required|string|max:3555',
            ]);

            $statement = Setting::findOrFail($this->statementId);

            $statement->affidavit_one = $this->affidavit_one;
            $statement->affidavit_two = $this->affidavit_two;
            $statement->save();

            // Success message
            $this->dispatch('toastr:success', message: 'Statement updated successfully.');
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
        return view('livewire.backend.statement.edit-statement')->layout('backend.template.body');
    }
}
