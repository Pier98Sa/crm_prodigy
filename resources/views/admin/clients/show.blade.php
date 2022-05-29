@extends('admin.layouts.app')

@section('pageTitle')
    Clients - {{$client->business_name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">client detail: {{$client->business_name}}</h1>

                <div class="card">
                    @if (isset($client->image))
                        <img src="{{asset('storage/'.$client->image)}}" class="card-img-top img-fluid" alt="img">
                    @else
                        <img src="{{asset('img/placeholder.jpg')}}" alt="placeholder_img" class="card-img-top img-fluid" >
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{$client->business_name}}</h2>
                        <p><strong>Client of:</strong> {{$client->user->name}}</p>
                        <p><strong>Address:</strong> {{$client->address}}</p>
                        <p><strong>City:</strong> {{$client->city}}</p>
                        <p><strong>Postal Code:</strong> {{$client->postal_code}}</p>
                        <p><strong>Email:</strong> {{$client->email}}</p>
                        <p><strong>Phone Number:</strong> {{$client->phone_number}}</p>
                        <p><strong>Vat Number:</strong> {{$client->vat_number}}</p>
                        <p><strong>Iban:</strong> {{$client->iban}}</p>
                    </div>
 
                   
                </div>

            </div>
           
        </div>

        <a href="{{route('admin.clients.index')}}" class="btn btn-primary mt-2">Go Back</a>
    </div>
@endsection