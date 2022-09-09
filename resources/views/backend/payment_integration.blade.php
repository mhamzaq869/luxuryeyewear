@extends('backend.layouts.master')
@section('title', 'Setting')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Post</h5>
        <div class="card-body">
            <form method="post" action="{{ route('settings.payment.int.save') }}">
                @csrf

                <div class="mb-2" data-select2-id="5">
                    <label for="ApiKeyType" class="form-label">Choose the Payment Method</label>
                    <select name="method" class="select2 form-control">
                        <option value="paypal">Paypal</option>
                        <option value="stripe">Stripe</option>
                    </select>
                </div>

                <div class="mb-2" data-select2-id="5">
                    <label for="ApiKeyType" class="form-label">Choose the Api key type</label>
                    <select name="type" class="select2 form-control">
                        <option value="sandbox">Sandbox</option>
                        <option value="live">Live</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="nameApiKey" class="form-label">Secret Key</label>
                    <input class="form-control" type="text" name="secret_key" placeholder="Secret Key" id="secret_key" data-msg="Please enter API key name" aria-invalid="false">
                </div>

                <div class="mb-2">
                    <label for="nameApiKey" class="form-label">Public Key</label>
                    <input class="form-control" type="text" name="public_key" placeholder="Public Key" id="public_key" data-msg="Please enter API key name" aria-invalid="false">
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>



    <div class="card mt-5">

        <div class="card-body" style="overflow: scroll">
            <h4 class="card-title">Payment Methods</h4>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Method</th>
                    <th scope="col">Type</th>
                    <th scope="col">Secret Key</th>
                    <th scope="col">Public Key</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($paymentIntegeration as $i => $pi)
                  <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$pi->method}}</td>
                    <td>{{$pi->type}}</td>
                    <td>{{$pi->secret_key}}</td>
                    <td>{{$pi->public_key}}</td>
                    <td>
                        <a href="{{route('settings.payment.int.destroy',[$pi->id])}}" class="btn btn-danger"><i class="fa fa-trash text-white"></i></a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
        </div>
    </div>

@endsection
