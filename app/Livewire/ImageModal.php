<?php

namespace App\Livewire;

use Livewire\Component;

class ImageModal extends Component
{
    public $isOpen = false;
    public $imageUrl;
    public $forum;

    public function mount($forum)
    {
        $this->forum = $forum;
    }

    public function openModal($imageUrl)
    {
        $this->isOpen = true;
        $this->imageUrl = $imageUrl;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->imageUrl = null;
    }

    public function render()
    {
        return view('livewire.image-modal');
    }
}
