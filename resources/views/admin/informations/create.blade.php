@extends('admin.layouts.app')

@section('pageTitle','CRM - new information')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Add new information</h1>
            <span>Marked fields(*) are required</span>

            <form method="POST" action="{{route('admin.informations.store')}}" class="mt-2">
                @csrf

                    <div class="form-group">
                        <label for="title">Title <strong>*</strong></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment <strong>*</strong>
                            <small class="d-block">Write at least 10 characters</small>
                        </label>
                        <textarea  class="form-control" name="comment" id="comment" cols="30" rows="10" required>{{old('comment')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="deadline">Deadline <strong>*</strong></label>
                        <input type="date" class="form-control" id="deadline" name="deadline" value="{{old('deadline')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="deadline">Typology <strong>*</strong></label>
                        <select class="form-control" id="typology_id" name="typology_id" >
                            @foreach ($typologies as $typology )
                                <option {{old('typology_id') == $typology->id? 'selected':''}} value="{{$typology->id}}">{{$typology->name}}</option>
                            @endforeach
                        </select>
                    </div>

                <button type="submit" class="btn btn-primary">+ Add</button>
            </form>
            </div>
        </div>
    </div>
@endsection