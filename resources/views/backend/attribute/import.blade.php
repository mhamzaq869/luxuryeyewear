@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Import Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.import.post')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputFile" class="col-form-label">Import Csv File <span class="text-danger">*</span></label>
          <div class="input-group">
          <input id="thumbnail" class="form-control" type="file" name="file" >
        </div>
          @error('file')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection