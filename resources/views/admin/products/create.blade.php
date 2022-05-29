@extends('admin.layouts.app')

@section('pageTitle','Create New Products')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Add a new product</h1>
            <span>Marked fields(*) are required</span>

            <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data" class="mt-2">
                @csrf
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>

                    <div class="form-group">
                        <label for="name">Product Name <strong>*</strong></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price <strong>*</strong></label>
                        <input type="number" step="0.10" min="1" class="form-control" id="price" name="price" value="{{old('price')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description <strong>*</strong>
                            <small class="d-block">Write at least 10 characters</small>
                        </label>
                        <textarea  class="form-control" name="description" id="description" cols="30" rows="10" required>{{old('description')}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">+ Add</button>
            </form>
            </div>
        </div>
    </div>
@endsection
