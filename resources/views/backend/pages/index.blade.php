@extends('backend.layouts.master')


@section('title', 'Page')
@section('main-content')

    <!-- DataTales Example -->

    <div class="card shadow mb-4 mt-5">

        <div class="row">

            <div class="col-md-12">

                @include('backend.layouts.notification')

            </div>

        </div>

        {{-- <form method="POST" id="category-form" action="{{ route('categories.delete') }}">
            @csrf --}}


            <div class="card-body">


                <div class="table-responsive">

                    {{-- @if (count($data['categories']) > 0)
                        @php
                            $i = 1000;
                            $cats = \App\Models\Category::with(['brand', 'frame_type'])->get();
                        @endphp
 --}}



                        <table id="banner-dataTable" class="table table-striped table-bordered" style="width:100%">


                            <thead>

                                <tr>

                                    <th>Sl</th>
                                    <th>Page</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>

                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{$page->id}}</td>
                                        <td>{{$page->name}}</td>
                                        <td>
                                            <a href="{{route('admin.page.edit',$page->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    {{-- @else
                        <h6 class="text-center">No Categories found!!! Please create Category</h6>
                    @endif --}}

                </div>

            </div>
        {{-- </form> --}}
    </div>

@endsection
