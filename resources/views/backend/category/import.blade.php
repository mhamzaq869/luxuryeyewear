@extends('backend.layouts.master')

@section('title','Import Category')

@section('main-content')



<div class="card">

    <h5 class="card-header">Import Category</h5>

    <div class="card-body">
      <a style="float: right;" href="{{route('category.export.get')}}">Download Excel Sample</a>
      <form method="post" action="{{route('category.import.post')}}" enctype="multipart/form-data">

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