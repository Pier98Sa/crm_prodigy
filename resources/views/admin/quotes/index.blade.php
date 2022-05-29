@extends('admin.layouts.app')

@section('pageTitle','Quotes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col text-uppercase">Comment</th>
                        <th scope="col text-uppercase">Price</th>
                        <th scope="col text-uppercase">Client</th>
                        <th scope="col text-uppercase">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($quotes as $quote )
                        <tr>
                            <td>{{$quote->comment}}</td>
                            <td>{{$quote->price}}</td>
                            <td>{{$quote->client->business_name}}</td>
                            <td class="d-flex">
                                <a href="{{route('admin.quotes.show', $quote->id)}}" class="btn btn-primary">More</a>
                                <a href="{{route('admin.quotes.edit', $quote->id)}}" class="btn btn-warning mx-2">Edit</a>

                                <!-- Button trigger modal -->
                                <!--nella onclick passare prima l'id e poi il nome della rotta-->
                                <button type="button" class="btn btn-danger" onclick="btnDelete('{{$quote->id}}', 'quotes');" data-toggle="modal" data-target="#cancel" >
                                    Remove
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="cancel" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Deleting quote ?</h5>
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