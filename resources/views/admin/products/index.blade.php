@extends('admin.layouts.app')

@section('pageTitle','Products')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-2">New Products</a>
            <a href="http://127.0.0.1:8000/products"  class="btn btn-primary mb-2" >View Products on site</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col text-uppercase">Image</th>
                        <th scope="col text-uppercase">Name</th>
                        <th scope="col text-uppercase">Price</th>
                        <th scope="col text-uppercase">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product )
                            <td class="w-25">
                                @if (isset($product->image))
                                  <img src="{{asset('storage/' . $product->image)}}" alt="foto" class="img-fluid" >
                                @else
                                  <img src="{{asset('img/placeholder.jpg')}}" alt="placeholder_img" class="img-fluid" >
                                @endif
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td class="d-flex">
                                <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-primary">Show</a>
                                <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning mx-2">Edit</a>

                                    <!-- Button trigger modal -->
                                <!--nella onclick passare prima l'id e poi il nome della rotta-->
                                <button type="button" class="btn btn-danger" onclick="btnDelete('{{$product->id}}', 'products');" data-toggle="modal" data-target="#cancel" >
                                    Remove
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="cancel" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Deleting the product ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" >
                                                    <span >&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p>Are you sure you want to erase it?</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="" method="POST" name="myForm" id='myForm'>
                                                    @csrf
                                                    @method('DELETE') 
                                                    
                                                    <button type="submit"  class="btn btn-danger">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection