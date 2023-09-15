<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class ProductModal extends ModalComponent
{
    public function render()
    {
        // return view('livewire.product-modal');
        return view('livewire.product-form');
    }
}
