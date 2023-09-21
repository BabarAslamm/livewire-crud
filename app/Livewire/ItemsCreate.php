<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Item;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;

class ItemsCreate extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $color = '';
    public bool $in_stock = false;
    public string $description = '';
    public int $category_id;
    public $categories;
    public ?UploadedFile $photo = null; // Initialize it as null



    protected $rules = [
        'name'=>'required',
        'description'=>'required',
        'category_id' => 'required',
        'color' => 'required',
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

        if ($this->photo) {
            $filename = $this->photo->store('items', 'public');
        }

        $item = new Item();
        $item->name = $this->name;
        $item->color = $this->color;
        $item->in_stock = $this->in_stock;
        $item->description = $this->description;
        $item->category_id = $this->category_id;
        $item->photo = $this->photo;
        if ($this->photo) {
            $item->photo = $filename; // Store the filename in the database
        }
        $item->save();

        $this->redirect('/items');
    }

    public function render()
    {
        return view('livewire.items-create');
    }
}
