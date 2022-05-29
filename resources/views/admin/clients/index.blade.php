@extends('admin.layouts.app')

@section('pageTitle','Clients')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.clients.create')}}" class="btn btn-primary mb-2">New Clients</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col text-uppercase">Image</th>
                        <th scope="col text-uppercase">Business Name</th>
                        <th scope="col text-uppercase">Address</th>
                        <th scope="col text-uppercase">Email</th>
                        <th scope="col text-uppercase">Phone Number</th>
                        <th scope="col text-uppercase">Client of</th>
                        <th scope="col text-uppercase">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clients as $client )
                        <tr>
                            <td class="w-25">
                                @if (isset($client->image))
                                  <img src="{{asset('storage/' . $client->image)}}" alt="foto" class="img-fluid" >
                                @else
                                  <img src="{{asset('img/placeholder.jpg')}}" alt="placeholder_img" class="img-fluid" >
                                @endif
                            </td>
                            <td>{{$client->business_name}}</td>
                            <td>{{$client->address}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->phone_number}}</td>
                            <td>{{$client->user->name}}</td>
                            <td class="d-flex">
                                <a href="{{route('admin.clients.show', $client->id)}}" class="btn btn-primary">More</a>
                                <a href="{{route('admin.clients.edit', $client->id)}}" class="btn btn-warning mx-2">Edit</a>

                                    <!-- Button trigger modal -->
                                <!--nella onclick passare prima l'id e poi il nome della rotta-->
                                <button type="button" class="btn btn-danger" onclick="btnDelete('{{$client->id}}', 'clients');" data-toggle="modal" data-target="#cancel" >
                                    Remove
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="cancel" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Deleting client ?</h5>
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