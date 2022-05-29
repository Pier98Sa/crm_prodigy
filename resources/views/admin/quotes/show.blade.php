@extends('admin.layouts.app')

@section('pageTitle')
    Quote - {{$quote->client->business_name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Quote detail of {{$quote->client->business_name}}</h1>

                <div class="card">
                    <div class="card-body">
                        <p class="card-text"> <strong>Comment:</strong>  {{$quote->comment}}</p>
                        <p><strong>Price:</strong> {{$quote->price}} &euro;</p>
                        <p> <strong>Selected Product:</strong> </p>
                        <ul>
                            @foreach ($quote->products as $product )
                                <li>{{$product->name}}</li>
                            @endforeach
                        </ul>
                    </div>
 
                   
                </div>

            </div>
           
        </div>

        <a href="{{route('admin.products.index')}}" class="btn btn-primary mt-2">Go Back</a>
    </div>
@endsection