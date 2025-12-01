<?php

namespace App\Livewire\Backend\Statement;

use App\Models\Setting;
use Livewire\Component;

class Statement extends Component
{
    

    public function render()
    {
        $statement = Setting::findOrFail(1);

        return view('livewire.backend.statement.statement', [
            'datas' => $statement,
        ])->layout('backend.template.body');
    }


}
