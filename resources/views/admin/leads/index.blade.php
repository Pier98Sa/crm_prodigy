@extends('admin.layouts.app')

@section('pageTitle','Leads')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col text-uppercase">Name</th>
                        <th scope="col text-uppercase">Email</th>
                        <th scope="col text-uppercase">Phone Number</th>
                        <th scope="col text-uppercase">Description</th>
                        <th scope="col text-uppercase">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($leads as $lead )
                        <tr>
                            <td>{{$lead->name}}</td>
                            <td>{{$lead->email}}</td>
                            <td>{{$lead->phone_number}}</td>
                            <td>{{$lead->description}}</td>
                            <td class="d-flex">
                                <a href="{{route('admin.leads.show', $lead->id)}}" class="btn btn-primary">More</a>
                                <a href="{{route('admin.clients.create',['id'=> $lead->id])}}" class="btn btn-warning mx-2">+Client</a>

                                <!-- Button trigger modal -->
                                <!--nella onclick passare prima l'id e poi il nome della rotta-->
                                <button type="button" class="btn btn-danger" onclick="btnDelete('{{$lead->id}}', 'leads');" data-toggle="modal" data-target="#cancel" >
                                    Remove
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="cancel" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Deleting lead ?</h5>
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