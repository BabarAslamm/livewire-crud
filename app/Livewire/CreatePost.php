<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{

    public string $title = '';
    public string $body = '';
    public bool $success = false;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save(): void
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->success = true;
        $this->reset('title', 'body'); 
    }
}
