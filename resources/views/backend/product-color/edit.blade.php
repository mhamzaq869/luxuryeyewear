@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('product-color.update',$productColor->id)}}">
        @csrf 
        @method('PATCH')
       <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="color_name" placeholder="Enter Product Name"  value="{{$productColor->color_name}}" class="form-control">
          @error('color_name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
          <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Product Front Image <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="color_image_name"  value="{{$productColor->color_image_name}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;">
          @if($productColor->color_image_name)
           <img src="{{asset($productColor->color_image_name)}}" style="height: 5rem;">
          @endif
        </div>
          @error('color_image_name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>  
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush