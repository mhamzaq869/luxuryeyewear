@extends('backend.layouts.master')

@section('title', 'Brand Edit')

@section('main-content')

    <div class="p-3">

        <h3>Edit Brand</h3>

        <form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">

            @csrf

            @method('PATCH')

            <div class="form-group">

                <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>

                <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{ $brand->title }}"
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
                    @if ($brand->brand_image)
                        <img src="{{ asset($brand->brand_image) }}" width="100" id="output">
                    @else
                        <img src="{{ asset('images/no_image.jpg') }}" width="100" height="100" id="output">
                    @endif
                </div>
            </div>
            <!------------------- image -------------------->

            <div class="form-group">

                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>

                <select name="status" class="form-control">

                    <option value="active" {{ $brand->status == 'active' ? 'selected' : '' }}>Active</option>

                    <option value="inactive" {{ $brand->status == 'inactive' ? 'selected' : '' }}>Inactive</option>

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

    <div id="imageModel" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Crop & Resize Upload Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                            <div class="col-md-12 px-2">
                                <div class="input-group py-2 input-group-sm">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text" for="dataWidth">Width</label>
                                    </span>
                                    <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                    <span class="input-group-append">
                                        <span class="input-group-text">px</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12 px-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text" for="dataWidth">Height</label>
                                    </span>
                                    <input type="text" class="form-control" id="dataHeight" placeholder="Height">
                                    <span class="input-group-append">
                                        <span class="input-group-text">px</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="crop">Crop</button>
                            {{-- <button type="button" class="btn btn-primary" id="skip">Skip</button> --}}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({

                placeholder: "Write short description.....",

                tabsize: 2,

                height: 150

            });
        });
    </script>
@endpush
