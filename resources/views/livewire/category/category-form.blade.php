<div class="row mt-5">


    <form wire:submit.prevent="store">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
        <div class="mb-3 row">
            <label for="category-name" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-8">
                <input type="text" wire:model='name' class="form-control" id="category-name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-2">
                <button  class="btn btn-outline-secondary">Save</button>
            </div>
        </div>
    </form>
</div>
