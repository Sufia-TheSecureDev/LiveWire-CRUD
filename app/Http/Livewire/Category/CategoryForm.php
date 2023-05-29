<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public  $name;

    protected $rules = [
        'name' => 'required|min:2',
    ];

    public function render()
    {
        return view('livewire.category.category-form');
    }


     Public function updated ($field){
         $this->validateOnly($field , [
              'name' => 'required | min:2'
         ]);
     }
    public function store():void
    {
        $validateData = $this->validate() ;
        \App\Models\Category::create($validateData);
        session()->flash('message', 'Category successfully inserted.');
        $this->reset('name');
    }
}
