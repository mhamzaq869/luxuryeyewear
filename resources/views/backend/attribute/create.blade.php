@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Attribute</h5>
    <div class="card-body">
      <form method="post" action="{{route('attribute.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
    <div class="form-group">
          <label for="attribute_type">Attribute Type <span class="text-danger">*</span></label>
          <select name="attribute_type" id="attribute_type" class="form-control">
              <option value="shape">shape</option>
              <option value="material">material</option>
              <option value="type">type</option>
              <option value="lens_type">lens_type</option>
              <option value="frame_type">Frame Type</option>
              <option value="product_for">Product For</option>
              <option value="extra">extra</option>
              <option value="order_status">Order Status</option>
          </select>
        </div>

        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection
