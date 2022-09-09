 @extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Category</h5>
    <div class="card-body">
      <form method="post" action="{{route('category.update',$category->id)}}">
        @csrf
        @method('PATCH')
         <input type="hidden" name='is_parent'  value='1'>
         <div class="form-group">

          <label for="inputTitle" class="col-form-label">Brand <span class="text-danger">*</span></label>
          <select name="brand_id" class="select2 form-control ">
            <option disabled="disabled">--Select Brand--</option>
            @foreach($brands as $brand)
            <option @if($category->brand_id == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->title}}</option>
            @endforeach
          </select>
          @error('brand')
          <span class="text-danger">{{$message}}</span>
          @enderror

        </div>
        <div class="form-group">

          <label for="inputTitle" class="col-form-label">Frame Type <span class="text-danger">*</span></label>
          <select name="frame_type" class="form-control">
            <option disabled="disabled">--Select Frame Type--</option>
            @foreach($frame_types as $frame_type)
            <option  @if($category->frame_type == $frame_type->id) selected @endif value="{{$frame_type->id}}">{{$frame_type->name}}</option>
            @endforeach
          </select>
          @error('brand')
          <span class="text-danger">{{$message}}</span>
          @enderror

        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$category->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Summary</label>
          <textarea class="form-control" rows="10" id="summary" name="summary">{{$category->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{--<div class="form-group">
          <label for="is_parent">Is Parent</label><br>
          <input type="checkbox" name='is_parent' id='is_parent' value='{{$category->is_parent}}' {{(($category->is_parent==1)? 'checked' : '')}}> Yes
        </div>
        {{-- {{$parent_cats}} --}}
        {{-- {{$category}} --}}

      {{--<div class="form-group {{(($category->is_parent==1) ? 'd-none' : '')}}" id='parent_cat_div'>
          <label for="parent_id">Parent Category</label>
          <select name="parent_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($parent_cats as $key=>$parent_cat)

                  <option value='{{$parent_cat->id}}' {{(($parent_cat->id==$category->parent_id) ? 'selected' : '')}}>{{$parent_cat->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo</label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$category->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>--}}

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active" {{(($category->status=='active')? 'selected' : '')}}>Active</option>
              <option value="inactive" {{(($category->status=='inactive')? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        @php
        $size = json_decode($category->size);
        @endphp
        <div class="jumbotron" id="cat_jumbotron">
          <h4>Frame Dimension Information</h4>
             <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                 <label for="width">Lens Width<span class="text-danger">*</span></label>
                  <input type="text" id="width" class="form-control" name="size[width]" value="{{$size->width ?? ''}}">
                   @error('category_total_width')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
               </div>
             </div>
              <div class="col-md-2">
                 <div class="form-group">
                  <label for="bridge">Bridge<span class="text-danger">*</span></label>
                   <input type="text" id="bridge" class="form-control" name="size[bridge]" value="{{$size->bridge ?? ''}}">
                      @error('category_bridge')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
              </div>
              <div class="col-md-2">
                 <div class="form-group">
                  <label for="arm_length">Arm Length<span class="text-danger">*</span></label>
                   <input type="text" id="arm_length" class="form-control" name="size[arm_length]" value="{{$size->arm_length ?? ''}}">
                </div>
              </div>

              <div class="col-md-2">
                 <div class="form-group">
                  <label for="lens_height">Lens Height<span class="text-danger">*</span></label>
                   <input type="text" id="lens_height" class="form-control" name="size[lens_height]" value="{{$size->lens_height ?? ''}}">
                </div>
              </div>


              <div class="col-md-2">
                 <div class="form-group">
                  <label for="total_width">Total Width<span class="text-danger">*</span></label>
                   <input type="text" id="total_width" class="form-control" name="size[total_width]" value="{{$size->total_width ?? ''}}">
                </div>
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
@push('scripts')

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>
<script type="text/javascript">

$( document ).ready(function() {
  $('.select-search').select2();
});
</script>
@endpush
