@extends('backend.layouts.master')
@section('title', 'Setting')
@section('main-content')

    <div class="p-3">

        <h4 class="m-0 font-weight-bold text-dark mb-3">Setting</h4>

        <form method="post" action="{{ route('settings.update') }}">
            @csrf

            <div class="form-group">
                <label for="short_des" class="col-form-label">Short Description <span class="text-danger">*</span></label>

                <textarea class="form-control mt-2" id="quote" name="short_des">{{ $data->short_des }}</textarea>
                @error('short_des')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description">{{ $data->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input class="form-control" type="file" name="logo"
                        value="{{ $data->logo }}">
                </div>
                <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

                @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input class="form-control" type="file" name="photo"
                        value="{{ $data->photo }}">
                </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="address" required value="{{ $data->address }}">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="email" required value="{{ $data->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="phone" required value="{{ $data->phone }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');
        $('#lfm1').filemanager('image');
        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });

        $(document).ready(function() {
            $('#quote').summernote({
                placeholder: "Write short Quote.....",
                tabsize: 2,
                height: 100
            });
        });
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
