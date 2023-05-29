<div class="row mt-3">
    <h5 class="mb-5 text-center">Services Info Goes Here </h5>
    <div class="col-md-6 ">
        <form>
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select wire:model="category_id" id="category_id" class="form-select"
                    aria-label="Default select example">>
                    <option selected value="">Select Category Name</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="service-name" class="form-label">Service Name</label>
                <input wire:model.lazy="name" type="text" class="form-control" id="service-name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea wire:model.lazy="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="service-image" class="form-label">Image</label>
                @if ($editMode)
                    <br>
                    <img height="60px" width="60px" src="{{ url('storage/' . $old_image) }}">
                    <label for="service-image" class="form-label">This is Old Image . please select new image </label>
                @endif
                <input wire:model="image" type="file" class="form-control" id="service-image" name="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="service-status" class="form-label">Status</label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" wire:model="status" id="service-status1"
                        value="1" checked>
                    <label class="form-check-label" for="service-status1">
                        Active
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" wire:model="status" id="service-status2"
                        value="0">
                    <label class="form-check-label" for="service-status2">
                        Inactive
                    </label>
                </div>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($editMode)
                <button wire:click.prevent="update" class="btn btn-secondary col-sm-12">Update</button>
            @else
                <button wire:click.prevent="store" class="btn btn-secondary col-sm-12">Create</button>
            @endif

        </form>
    </div>
    <div class="col-md-6">
        @if (!empty($services))
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $service->name }}</td>
                            <td>
                                <img height="60px" width="60px" src="{{ url('storage/' . $service->image) }}"
                                    alt="{{ $service->name }}">
                            </td>
                            <td style="font-size: x-large;">
                                <a wire:click="edit({{ $service->id }})" class="text-success text-decoration-none "><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a wire:click="delete({{ $service->id }})"  class="text-danger text-decoration-none "><i class="fa-solid fa-trash-can"></i></a>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="paginate">
                {{ $services->links() }}
            </div>

        @endif
    </div>
</div>
<style>
    svg {
        height: 20px;
        width: 20px;
    }

    .paginate {
        display: flex;
        justify-content: right;
        margin-top: 20px;
    }
</style>
