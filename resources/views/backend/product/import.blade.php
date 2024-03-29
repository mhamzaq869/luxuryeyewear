@extends('backend.layouts.master')
@section('title', 'Import Product')
@section('main-content')

    <div class="p-3">
        <h3>Import Product</h3>

        <form method="post" action="{{ route('product.import.post') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputFile" class="col-form-label">Import Csv File <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="thumbnail" class="form-control" type="file" name="file">
                </div>
                @error('file')
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
