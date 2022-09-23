@extends('user.layouts.master')

@section('title', 'Create Address')

@section('main-content')
    <h1 class="side-title"> Create Address</h1>
    <form action="{{route('user.address.update',[$address->id])}}" method="Post" class="form">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <label class="label">Address Name</label>
                <input type="text" name="title" id="name"  placeholder="Home, Office, Work etc."
                    class="form-control form-field" value="{{$address->title}}">

            </div>

        </div>


        <div class="row">
            <div class="col-12 col-lg-6">
              <label class="label">First Name</label>
              <input type="text" name="first_name" value="{{$address->first_name}}" id="name" placeholder="Enter your first name" class="form-control form-field" value="">
            </div>
            <div class="col-12 col-lg-6">
              <label class="label">Last Name</label>
              <input type="text" name="last_name" value="{{$address->last_name}}" id="name" placeholder="Enter your last name" class="form-control form-field" value="">
            </div>
          </div>


        <div class="row">
            <div class="col-12 col-lg-6">
                <label class="label">Email</label>
                <input type="text" name="email" id="name" value="{{$address->email}}" placeholder="Enter your email" class="form-control form-field" value="">
              </div>

            <div class="col-6 col-lg-6">
                <label class="label">Country/region</label>
                <select class="form-control form-field country" name="country_id" id="country" required="">
                    <option selected="">Select Coutry</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}"
                            {{ $country->id == $address->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-lg-4">
                <label class="label">State</label>
                <select class="form-control form-field state" name="state_id" id="state" required="">
                    <option selected="">Select state</option>
                    @foreach ($states as $state)
                        <option value="{{$state->id}}" {{$state->id == $address->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                    @endforeach
                  </select>
            </div>

            <div class="col-12 col-lg-4">
                <label class="label">City</label>
                <input type="text" name="city" id="city" required="" placeholder="Enter your city"
                    class="form-control form-field" value="{{$address->city}}">
            </div>



            <div class="col-12 col-lg-4">
                <label class="label">Pin code</label>
                <input type="text" name="zipcode" id="pincode" required="" placeholder="Enter your pincode"
                    class="form-control form-field" value="{{$address->zipcode}}">
            </div>

        </div>


        <div class="row">
            <div class="col-12 col-lg-12">
                <label class="label">Phone</label>
                <input type="text" name="Phone" id="phone" placeholder="Enter your phone"
                    class="form-control form-field " value="{{$address->phone}}">
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
                <label class="label">Company (optional)</label>
                <textarea type="text" class="form-control form-field" rows="3" name="company" id="address"
                    placeholder="Company (optional)">{{$address->company}}</textarea>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <label class="label">Address line 1</label>
                <textarea type="text" class="form-control form-field" rows="3" name="address_1" id="address"
                    placeholder="Enter your address detail here...">{{$address->address_1}}</textarea>
                <textarea type="text" class="form-control form-field" rows="3" name="address_2" id="address"
                    placeholder="Enter your address detail here...">{{$address->address_2}}</textarea>


            </div>

        </div>




        <div class="row submit_line">
            <div class="col-12 col-lg-6 text-end">
                <button type="submit" class="btn btn-primary btn_left">
                    <svg width="20px" height="20px" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.90321 7.29677C1.90321 10.341 4.11041 12.4147 6.58893 12.8439C6.87255 12.893 7.06266 13.1627 7.01355 13.4464C6.96444 13.73 6.69471 13.9201 6.41109 13.871C3.49942 13.3668 0.86084 10.9127 0.86084 7.29677C0.860839 5.76009 1.55996 4.55245 2.37639 3.63377C2.96124 2.97568 3.63034 2.44135 4.16846 2.03202L2.53205 2.03202C2.25591 2.03202 2.03205 1.80816 2.03205 1.53202C2.03205 1.25588 2.25591 1.03202 2.53205 1.03202L5.53205 1.03202C5.80819 1.03202 6.03205 1.25588 6.03205 1.53202L6.03205 4.53202C6.03205 4.80816 5.80819 5.03202 5.53205 5.03202C5.25591 5.03202 5.03205 4.80816 5.03205 4.53202L5.03205 2.68645L5.03054 2.68759L5.03045 2.68766L5.03044 2.68767L5.03043 2.68767C4.45896 3.11868 3.76059 3.64538 3.15554 4.3262C2.44102 5.13021 1.90321 6.10154 1.90321 7.29677ZM13.0109 7.70321C13.0109 4.69115 10.8505 2.6296 8.40384 2.17029C8.12093 2.11718 7.93465 1.84479 7.98776 1.56188C8.04087 1.27898 8.31326 1.0927 8.59616 1.14581C11.4704 1.68541 14.0532 4.12605 14.0532 7.70321C14.0532 9.23988 13.3541 10.4475 12.5377 11.3662C11.9528 12.0243 11.2837 12.5586 10.7456 12.968L12.3821 12.968C12.6582 12.968 12.8821 13.1918 12.8821 13.468C12.8821 13.7441 12.6582 13.968 12.3821 13.968L9.38205 13.968C9.10591 13.968 8.88205 13.7441 8.88205 13.468L8.88205 10.468C8.88205 10.1918 9.10591 9.96796 9.38205 9.96796C9.65819 9.96796 9.88205 10.1918 9.88205 10.468L9.88205 12.3135L9.88362 12.3123C10.4551 11.8813 11.1535 11.3546 11.7585 10.6738C12.4731 9.86976 13.0109 8.89844 13.0109 7.70321Z"
                            fill="currentColor"></path>
                    </svg>
                    Update Info</button>
            </div>


        </div>

    </form>

@endsection
