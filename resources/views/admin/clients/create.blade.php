@extends('admin.layouts.app')

@section('pageTitle','Add New Clients')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Add a new client</h1>
            <span>Marked fields(*) are required</span>

            <form method="POST" action="{{route('admin.clients.store')}}" enctype="multipart/form-data" class="mt-2">
                @csrf
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>

                    <div class="form-group">
                        <label for="business_name">Business Name <strong>*</strong></label>
                        <input type="text" class="form-control" id="business_name" name="business_name" value="{{old('business_name')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address <strong>*</strong></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City <strong>*</strong></label>
                        <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="postal_code">Postal Code <strong>*</strong></label>
                        <input type="number"  class="form-control" id="postal_code" name="postal_code" value="{{old('postal_code')}}" required pattern="[0-9]+" minlength="5" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="email">Email <strong>*</strong></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number <strong>*</strong></label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number')}}" required pattern="[0-9]+" minlength="9" maxlength="15">
                    </div>

                    <div class="form-group">
                        <label for="vat_number">Vat Number <strong>*</strong></label>
                        <small class="d-block">Must be composed of 11 numbers</small>
                        <input type="text" class="form-control" id="vat_number" name="vat_number" value="{{old('vat_number')}}" required pattern="[0-9]+" maxlength="11" minlength="11">
                    </div>

                    <div class="form-group">
                        <label for="iban">Iban <strong>*</strong></label>
                        <input type="text" class="form-control" id="iban" name="iban" value="{{old('iban')}}" required maxlength="27" minlength="27">
                    </div>

                    
                    <button type="submit" class="btn btn-primary">+ Add</button>
            </form>
            </div>
        </div>
    </div>
@endsection