@extends('backend.layouts.master')


@section('title', 'Page')
@section('main-content')

    <!-- DataTales Example -->

    <div class="p-3 mb-4 mt-5">

        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')

            </div>

        </div>


        <h3 class="m-0 font-weight-bold text-dark float-left mb-4">Manage Pages</h3>

        <div class="table-responsive">

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
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->name }}</td>
                            <td>
                                <a href="{{ route('admin.page.edit', $page->id) }}"
                                    class="btn btn-primary btn-sm float-left mr-1"
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                    data-placement="bottom"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

@endsection
