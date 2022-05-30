@extends('admin.layouts.app')

@section('pageTitle')
    Lead - {{$lead->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Lead detail of {{$lead->name}}</h1>

                <div class="card">
                    <div class="card-body">
                        <p  class="card-text"><strong>Email:</strong>{{$lead->email}}</p>
                        <p  class="card-text"><strong>Phone Number:</strong>{{$lead->phone_number}}</p>
                        <p class="card-text"> <strong>Description:</strong>  {{$lead->description}}</p>
                    </div>
 
                   
                </div>

            </div>
           
        </div>

        <a href="{{route('admin.leads.index')}}" class="btn btn-primary mt-2">Go Back</a>
    </div>
@endsection