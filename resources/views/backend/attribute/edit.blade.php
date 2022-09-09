@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('attribute.update',$attribute->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" value="{{$attribute->name}}" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      <div class="form-group">
          <label for="attribute_type">Attribute Type <span class="text-danger">*</span></label>
          <select name="attribute_type" id="attribute_type" class="form-control">
              <option value="product_for" {{(($attribute->attribute_type=='product_for')? 'selected' : '')}}>product_for</option>
              <option value="shape" {{(($attribute->attribute_type=='shape')? 'selected' : '')}}>shape</option>
              <option value="material" {{(($attribute->attribute_type=='material')? 'selected' : '')}}>material</option>
              <option value="type" {{(($attribute->attribute_type=='type')? 'selected' : '')}}>type</option>
              <option value="lens_type" {{(($attribute->attribute_type=='lens_type')? 'selected' : '')}}>lens_type</option>
              <option value="extra" {{(($attribute->attribute_type=='extra')? 'selected' : '')}}>extra</option>
          </select>
        </div>


        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection
