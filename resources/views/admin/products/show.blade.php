@extends('admin.layouts.app')

@section('pageTitle')
    Product - {{$product->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Product detail: {{$product->name}}</h1>

                <div class="card">
                    @if (isset($product->image))
                        <img src="{{asset('storage/'.$product->image)}}" class="card-img-top img-fluid" alt="img">
                    @else
                        <img src="{{asset('img/placeholder.jpg')}}" alt="placeholder_img" class="card-img-top img-fluid" >
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{$product->name}}</h2>
                        <p class="card-text"> <strong>Description:</strong>  {{$product->description}}</p>
                        <span><strong>Price:</strong> {{$product->price}} &euro;</span>
                    </div>
 
                   
                </div>

            </div>
           
        </div>

        <a href="{{route('admin.products.index')}}" class="btn btn-primary mt-2">Go Back</a>
    </div>
@endsection