@extends('backend.layouts.master')

@section('title', 'Edit Page')

@section('main-content')



    <div class="p-3">

        <h5 class="card-header">Edit Page</h5>
        {{-- <div class="card-body"> --}}

            <form method="post" action="{{ route('admin.page.update', $page->id) }}" enctype="multipart/form-data">

                @csrf

                <textarea class="form-control" hidden id="description" name="content"> {!! $page->content ?? '' !!} </textarea>
                <div class="form-group mt-3">

                    <button class="btn btn-success" type="submit">Update</button>

                </div>

            </form>

        {{-- </div> --}}

    </div>



@endsection



@push('scripts')

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
         CKEDITOR.replace( 'description', {
                resize_dir: 'both',
                removeButtons: 'PasteFromWord'
            } );
    </script>
@endpush
