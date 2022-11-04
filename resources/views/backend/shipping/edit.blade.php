@extends('backend.layouts.master')
@section('title', 'Edit Shipping ')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Shipping</h5>
        <div class="card-body">
            <form method="post" action="{{ route('shipping.update', $shipping->id) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Type <span class="text-danger">*</span></label>
                            <input id="inputTitle" type="text" name="type" placeholder="Enter type"
                                value="{{ $shipping->type }}" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Countries <span class="text-danger">*</span></label>
                            <select class="select2 form-control " id="countries" name="countries[]" style="width: 100%; height:36px;">

                                @foreach ($countries as $user)
                                    <option value="{{ $user->shortname }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Transit From<span class="text-danger">*</span></label>
                            <input  type="date" name="transitfrom" placeholder="5-10"  value="{{ $shipping->transitfrom }}" class="form-control">
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Transit To<span class="text-danger">*</span></label>
                            <input  type="date" name="transitto" placeholder="5-10"  value="{{ $shipping->transitto }}" class="form-control">
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
                            <input id="price" type="number" name="price" placeholder="Enter price"
                                value="{{ $shipping->price }}" class="form-control">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="active" {{ $shipping->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $shipping->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
        .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #17a2b8;

        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
            padding-left: 20px !important;
            color:white
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            background-color: #0750bd00;
            border: none;
            border-right: 1px solid #aaa0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            color: rgb(255, 255, 255);
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            padding: 0 4px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #4e73df;
            border: 1px solid #aaa;
            border-radius: 4px;
            display: inline-block;
            margin-left: 5px;
            margin-top: 5px;
            padding: 0;
        }

    </style>
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });

        $("#countries").select2({ multiple: true });
        $('#countries').val(@json($shipping->countries)).trigger('change');
    </script>
@endpush
