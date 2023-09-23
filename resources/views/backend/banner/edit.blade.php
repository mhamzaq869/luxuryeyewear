@extends('backend.layouts.master')

@section('title', 'Edit Banner')

@section('main-content')

    <div class="p-3">
        <h3>Edit Banner</h3>

        <form method="post" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">

            @csrf

            @method('PATCH')

            <div class="form-group">
                <div class="row">
                    <div class="col-1">
                        <label for="inputTitle" class="col-form-label">Title</label>
                    </div>
                    <div class="col-3">
                        <input type="color" name="title_color" class="mt-2" value="{{ $banner->title_color }}"
                            style="width:25px; padding:0">
                    </div>
                </div>

                <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{ $banner->title }}"
                    class="form-control">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>



            <div class="form-group">
                <label for="inputDesc" class="col-form-label">Type</label>
                <select name="type" class="form-control" id="">
                    <option value="slider" {{ $banner->type == 'slider' ? 'selected' : '' }}>Slider</option>
                    <option value="gallery" {{ $banner->type == 'gallery' ? 'selected' : '' }}>Gallery</option>
                    <option value="female_sunglass" {{ $banner->type == 'female_sunglass' ? 'selected' : '' }}>Female
                        Sunglass</option>
                    <option value="man_sunglass" {{ $banner->type == 'man_sunglass' ? 'selected' : '' }}>Man Sunglass
                    </option>
                    <option value="female_eyeglass" {{ $banner->type == 'female_eyeglass' ? 'selected' : '' }}>Female
                        Eyeglass</option>
                    <option value="man_eyeglass" {{ $banner->type == 'man_eyeglass' ? 'selected' : '' }}>Man Eyeglass
                    </option>
                </select>
            </div>

            <div class="form-group">

                <label for="inputTitle" class="col-form-label">Brand <span class="text-danger">*</span></label>
                <select name="brand_id" class="form-control select2">
                    <option disabled="disabled">--Select Brand--</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $banner->brand_id ? 'selected' : '' }}>
                            {{ $brand->title }}</option>
                    @endforeach
                </select>
                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="inputDesc" class="col-form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $banner->description }}</textarea>

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>



            <div class="form-group">

                <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>

                <div class="input-group">

                    <input class="form-control" type="file" name="photo" value="{{ $banner->photo }}">

                </div>

                <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                <img src="{{ $banner->photo }}" alt="{{ $banner->photo }}" style="width:10%">

                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>



            <div class="form-group">

                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>

                <select name="status" class="form-control">

                    <option value="active" {{ $banner->status == 'active' ? 'selected' : '' }}>Active</option>

                    <option value="inactive" {{ $banner->status == 'inactive' ? 'selected' : '' }}>Inactive</option>

                </select>

                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group my-3">

                <button class="btn btn-success" type="submit">Update</button>

            </div>

        </form>
    </div>



@endsection



@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description', {
            width: 1080,
            height: 300,
            resize_dir: 'both',
            removeButtons: 'PasteFromWord'
        });
    </script>
@endpush
