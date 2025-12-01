<?php

namespace App\Livewire\Backend\Hospital;

use App\Models\Otconsent;
use Livewire\Component;
use Livewire\WithPagination;

class Consent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $consents = Otconsent::latest()->paginate(10);

        return view('livewire.backend.hospital.consent', [
            'datas' => $consents,
        ])->layout('backend.template.body');
    }
}
