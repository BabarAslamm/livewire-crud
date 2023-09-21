<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Category;

class ItemsEdit extends Component
{

    public int $itemId;
    public string $name = '';
    public string $color = '';
    public bool $in_stock = false;
    public string $description = '';
    public int $category_id;
    public $categories;


    protected $rules = [
        'name'=>'required',
        'color' => 'required',
        'description'=>'required',
        'category_id' => 'required',

    ];

    public function mount(Item $item): void
    {
        $this->itemId = $item->id;
        $this->name = $item->name;
        if($item->color){
            $this->color = $item->color;
        }
        if($item->in_stock){
            $this->in_stock = $item->in_stock;
        }

        $this->description = $item->description;
        $this->category_id = $item->category_id;
        $this->categories = Category::pluck('name', 'id');
    }


    public function save(): void
    {
        $this->validate();




        $item = Item::where('id', $this->itemId)->first();
        $item->name = $this->name;
        $item->color = $this->color;
        $item->in_stock = $this->in_stock;
        $this->in_stock = $item->in_stock;
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
