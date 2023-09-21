<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Category;

class ItemsEdit extends Component
{

    public int $itemId;
    public string $name = '';
    public string $description = '';
    public int $category_id;
    public $categories;


    protected $rules = [
        'name'=>'required',
        'description'=>'required',
        'category_id' => 'required',

    ];

    public function mount(Item $item): void
    {
        $this->itemId = $item->id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->category_id = $item->category_id;
        $this->categories = Category::pluck('name', 'id');
    }


    public function save(): void
    {
        $this->validate();

        $item = Item::where('id', $this->itemId)->first();
        $item->name = $this->name;
        $item->description = $this->description;
        $item->category_id = $this->category_id;
        $item->save();

        $this->redirect('/items');
    }


    public function render()
    {
        return view('livewire.items-edit');
    }
}
