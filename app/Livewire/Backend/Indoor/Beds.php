<?php

namespace App\Livewire\Backend\Indoor;

use App\Models\Bed;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\ValidationException;

class Beds extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';
    public $bedId;
    public $bed_category, $bed_type, $floor_no, $room_no, $bed_no, $charge;

    protected function rules()
    {
        return [
            'bed_category' => 'required|in:OPD,Cabin,Ward',
            'bed_type'     => 'required|string|max:50',
            'floor_no'     => 'required|string|max:50',
            'room_no'      => 'required|string|max:100',
            'bed_no'       => 'required|string|max:50',
            'charge'       => 'required|numeric|min:0',
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
        $bed = Bed::findOrFail($id);
        $this->bedId = $bed->id;
        $this->bed_category = $bed->bed_category;
        $this->bed_type = $bed->bed_type;
        $this->floor_no = $bed->floor_no;
        $this->room_no = $bed->room_no;
        $this->bed_no = $bed->bed_no;
        $this->charge = $bed->charge;

        $this->dispatch('openModal', id: 'categoryModal');
    }

    // ✅ Save or Update Bed
    public function saveBed()
    {
        try {
            $this->validate();

            Bed::updateOrCreate(
                ['id' => $this->bedId],
                [
                    'bed_category' => $this->bed_category,
                    'bed_type' => $this->bed_type,
                    'floor_no' => $this->floor_no,
                    'room_no' => $this->room_no,
                    'bed_no' => $this->bed_no,
                    'charge' => $this->charge,
                ]
            );

            $message = $this->bedId ? 'Bed updated successfully.' : 'Bed added successfully.';
            $this->dispatch('toastr:success', message: $message);
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

    // ✅ Confirm Delete
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dispatch('openModal', id: 'deleteModal');
    }

    // ✅ Delete Action
    public function delete()
    {
        try {
            $bed = Bed::findOrFail($this->deleteId);
            $bed->delete();

            $this->dispatch('toastr:success', message: 'Bed deleted successfully.');
            $this->dispatch('closeModal', id: 'deleteModal');
            $this->deleteId = null;
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    // ✅ Reset Form
    private function resetForm()
    {
        $this->reset(['bedId', 'bed_category', 'bed_type', 'floor_no', 'room_no', 'bed_no', 'charge']);
    }

    public function render()
    {
        $beds = Bed::query()
            ->when($this->search, fn($query) =>
                $query->where('bed_category', 'like', '%' . $this->search . '%')
                      ->orWhere('room_no', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(20);

        return view('livewire.backend.indoor.beds', [
            'datas' => $beds
        ])->layout('backend.template.body');
    }
}
