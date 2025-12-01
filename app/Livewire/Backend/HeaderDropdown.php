<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class HeaderDropdown extends Component
{
    public bool $dropdownOpen = false;

    public function toggleDropdown()
    {
        $this->dropdownOpen = ! $this->dropdownOpen;
    }

    public function render()
    {
        return view('livewire.backend.header-dropdown')->layout('backend.template.body');
    }
}
