@extends('admin.layouts.app')

@section('pageTitle')
    Information - {{$information->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Information detail: {{$information->title}}</h1>

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{$information->title}}</h2>
                        <p class="card-text"> <strong>Descrizione:</strong>  {{$information->comment}}</p>
                        <p><strong>Deadline:</strong> {{$information->deadline}} </p>
                        <p><strong>Typology:</strong> {{$information->typology->name}} </p>
                        <p><strong>Last edited by:</strong> {{$information->user->name}} </p>
                    </div>
                </div>

            </div>
           
        </div>

        <a href="{{route('admin.informations.index',['id' => $information->client_id ])}}" class="btn btn-primary mt-2">Go Back</a>
    </div>
@endsection