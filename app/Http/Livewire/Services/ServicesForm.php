<?php

namespace App\Http\Livewire\Services;

use App\Models\Category;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class ServicesForm extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $category_id, $description, $image, $status, $categories;
    public $old_id, $old_image, $editMode = false;

    protected $rules = [
        'name' => 'required|string',
        'category_id' => 'required',
        'description' => 'required',
        'status' => 'required',
        'image' => 'required|image'
    ];

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|string',
            'category_id' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required|image'
        ]);
    }
    public function mount()
    {
        $this->resetInputField();
        $this->categories = Category::all();
    }

    public function render()
    {

        return view('livewire.services.services-form', [
            'services' => Services::orderBy('id', 'desc')->paginate(2)
        ]);
    }
    public function storeImage()
    {
        $file = $this->image;
        $image_name = Str::of($this->name)->slug() . '-' . Time() . '.' .  $file->extension();
        $this->image = $file->storePubliclyAs('public/service-image', $image_name);
    }

    public function store(): void
    {
        $this->validate();
        $this->storeImage();
        \App\Models\Services::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status
        ]);
        session()->flash('message', 'Service successfully inserted!');
        $this->resetInputField();
    }
    public function edit($id)
    {
        $this->old_id = $id;
        $service = Services::findOrFail($id);
        $this->name = $service->name;
        $this->category_id = $service->category_id;
        $this->description = $service->description;
        $this->status = $service->status;
        $this->image = $service->image;
        $this->old_image = $service->image;
        $this->editMode = true;
    }
    public function update()
    {
        $service = Services::findOrFail($this->old_id);
        if ($this->image) {
            if ($service->image) {
                Storage::delete($service->image);
            }
        }
        $this->validate();
        $this->storeImage();
        $service->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status
        ]);
        $this->resetInputField();
        session()->flash('message', 'Service Update Successfully!');
        $this->editMode = false;
    }
    public function delete($id)
    {
        $service = Services::findOrFail($id);
        if ($service->image) {
            Storage::delete($service->image);
        }
        $service->delete();
        $this->resetInputField();
        session()->flash('message', 'Service Deleted Successfully!');
    }

    public function resetInputField()
    {
        $this->name = '';
        $this->category_id = null;
        $this->description = '';
        $this->image = null;
        $this->status = '';
    }
}
