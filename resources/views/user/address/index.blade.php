@extends('user.layouts.master')

@section('title', 'Shipping Addresses')

@section('main-content')
    <style>
        .border{
            border: none !important;
        }

        .border-radius{
            border-radius:50%;
        }
    </style>
    <h1 class="side-title"> Shipping Addresses</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header border">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Shipping 1</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('user.address.edit',[1])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div>State</div>
                    <div>Country: </div>
                    <div>Zipcode</div>
                    <div>Address 1</div>
                    <div>Address 2</div>
                </div>
            </div>
        </div>
    </div>
@endsection
