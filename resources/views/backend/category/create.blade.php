@extends('backend.layouts.master')
@section('title', ' Add Category ')
@section('main-content')

<div class="card">

    <h5 class="card-header">@yield('title') </h5>

    <div class="card-body">

      <form method="post" action="{{route('category.store')}}">
        {{csrf_field()}}
        <input type="hidden" name='is_parent'  value='1'>
         <div class="form-group">

          <label for="inputTitle" class="col-form-label">Brand <span class="text-danger">*</span></label>
          <select name="brand_id" class="form-control select-search">
            <option disabled="disabled">--Select Brand--</option>
            @foreach($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->title}}</option>
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
            <option  value="{{$frame_type->id}}">{{$frame_type->name}}</option>
            @endforeach
          </select>
          @error('brand')
          <span class="text-danger">{{$message}}</span>
          @enderror

        </div>

        <div class="form-group">

          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>

          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">

          @error('title')

          <span class="text-danger">{{$message}}</span>

          @enderror

        </div>



        <div class="form-group">

          <label for="summary" class="col-form-label">Summary</label>

          <textarea class="form-control" rows="10" id="summary" name="summary">{{old('summary')}}</textarea>

          @error('summary')

          <span class="text-danger">{{$message}}</span>

          @enderror

        </div>


       {{-- <div class="form-group">

          <label for="inputPhoto" class="col-form-label">Photo</label>

          <div class="input-group">

              <span class="input-group-btn">

                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">

                  <i class="fa fa-picture-o"></i> Choose

                  </a>

              </span>

          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">

        </div>

        <div id="holder" style="margin-top:15px;max-height:100px;"></div>



          @error('photo')

          <span class="text-danger">{{$message}}</span>

          @enderror

        </div> --}}

        

        <div class="form-group">

          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>

          <select name="status" class="form-control">

              <option value="active">Active</option>

              <option value="inactive">Inactive</option>

          </select>

          @error('status')

          <span class="text-danger">{{$message}}</span>

          @enderror

        </div>
        <div class="jumbotron" id="cat_jumbotron">
          <h4>Frame Dimension Information</h4>
             <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                 <label for="width">Lens Width<span class="text-danger">*</span></label>
                  <input type="text" id="width" class="form-control" name="size[width]">
                   @error('category_total_width')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
               </div>
             </div>
              <div class="col-md-2">
                 <div class="form-group">
                  <label for="bridge">Bridge<span class="text-danger">*</span></label>
                   <input type="text" id="bridge" class="form-control" name="size[bridge]">
                      @error('category_bridge')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
              </div>
              <div class="col-md-2">
                 <div class="form-group">
                  <label for="arm_length">Arm Length<span class="text-danger">*</span></label>
                   <input type="text" id="arm_length" class="form-control" name="size[arm_length]">
                </div>
              </div>

              <div class="col-md-2">
                 <div class="form-group">
                  <label for="lens_height">Lens Height<span class="text-danger">*</span></label>
                   <input type="text" id="lens_height" class="form-control" name="size[lens_height]">
                </div>
              </div>
           

              <div class="col-md-2">
                 <div class="form-group">
                  <label for="total_width">Total Width<span class="text-danger">*</span></label>
                   <input type="text" id="total_width" class="form-control" name="total_width">
                </div>
              </div>
            </div>
        </div>

        <div class="form-group mb-3">

          <button type="reset" class="btn btn-warning">Reset</button>

           <button class="btn btn-success" type="submit">Submit</button>

        </div>

      </form>

    </div>

</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>
<script type="text/javascript">
  $('.select-search').select2();
</script>
@endpush