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

    <h1 class="side-title">
        <div class="row">
            <div class="col-md-9">
                Shipping Addresses
            </div>
            <div class="col-md-3">
                <a class="btn btn-warning text-white" href="{{route('user.address.create')}}">+ Add Address</a>
            </div>
        </div>
    </h1>

    <div class="row">
        @foreach ($address as $add)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header border">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>{{$add->title}}</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('user.address.edit',[$add->id])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div>State: {{$add->state->name}}</div>
                    <div>Country: {{$add->country->name}}</div>
                    <div>Pincode: {{$add->zipcode}}</div>
                    <div>Address 1: {{$add->address_1}}</div>
                    <div>Address 2: {{$add->address_2}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
