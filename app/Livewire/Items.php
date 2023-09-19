<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class Items extends Component
{
    use WithPagination;
    public $categories;
    public string $searchQuery = '';
    public int $searchCategory = 0;

    public function mount(): void
    {
        $this->categories = Category::all();
    }



    public function render()
    {

        $items = Item::with('category')
            ->when($this->searchQuery !== '', fn(Builder $query) => $query->where('name', 'like', '%'. $this->searchQuery .'%'))
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->where('category_id', $this->searchCategory))
        ->paginate(5);

        return view('livewire.items', compact('items'));


        // return view('livewire.items', [
        //     'items' => Item::all(),
        // ]);
    }

    public function updating($key): void
    {
        if ($key === 'searchQuery' || $key === 'searchCategory') {
            $this->resetPage();
        }
    }



    public function deleteItem(int $itemId): void
    {
        Item::where('id', $itemId)->delete();
    }
}
