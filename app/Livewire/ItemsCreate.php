<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Item;

class ItemsCreate extends Component
{
    public string $name = '';
    public string $description = '';
    public int $category_id;
    public $categories;


    protected $rules = [
        'name'=>'required',
        'description'=>'required',
        'category_id' => 'required',

    ];

    protected $messages = [
        'category_id.required' => 'The category field is required.',
    ];

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function save(): void
    {
        $this->validate();

        $item = new Item();
        $item->name = $this->name;
        $item->description = $this->description;
        $item->category_id = $this->category_id;
        $item->save();

        $this->redirect('/items');
    }

    public function render()
    {
        return view('livewire.items-create');
    }
}