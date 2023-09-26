@extends('backend.layouts.master')

@section('title', 'Brand Create')

@section('main-content')

    <div class="p-3">

        <h3>Add Brand</h3>

        <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">

                <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>

                <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{ old('title') }}"
                    class="form-control">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <!-------------- image ---------------------->

            <div class="form-group">
                <label for="image">Brand image</label>
                <input type="hidden" name="brand_img">
                <input name="brand_image" id="brand_img" type="file" class="form-control" accept="image/*">
                @error('brand_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="controls">
                    <img src="{{ asset('images/no_image.jpg') }}" width="100" height="100" id="output">
                </div>
            </div>

            <div class="form-group">

                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>

                <select name="status" class="form-control">

                    <option value="active">Active</option>

                    <option value="inactive">Inactive</option>

                </select>

                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group my-3">

                <button type="reset" class="btn btn-warning">Reset</button>

                <button class="btn btn-success" type="submit">Submit</button>

            </div>

        </form>

    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endpush
