<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Shop extends Component
{
    public $area_id;
    public $genre_id;
    public $name;
    public $overview;
    public $image_url;
    public function render()
    {
        return view('livewire.shop');
    }
}