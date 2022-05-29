@extends('admin.layouts.app')

@section('pageTitle')
    Edit - {{$product->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Product edit: {{$product->name}}</h1>
            <span>Marked fields(*) are required</span>

            <form method="POST" action="{{route('admin.products.update', $product->id)}}" enctype="multipart/form-data" class="mt-2">
                @csrf
                @method('PUT')
                    @if ($product->image)
                        <div class="form-group">
                            <h3>Current image</h3>
                            <img src="{{asset('storage/' . $product->image)}}" alt="img" class="w-50">
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>

                    <div class="form-group">
                        <label for="name">Product Name <strong>*</strong></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $product->name)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price <strong>*</strong></label>
                        <input type="number" step="0.10" min="1" class="form-control" id="price" name="price" value="{{old('price', $product->price)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Product Descriptionn <strong>*</strong>
                            <small class="d-block">Write at least 10 characters</small>
                        </label>
                        <textarea  class="form-control" name="description" id="description" cols="30" rows="10" required>{{old('description', $product->description)}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
        </div>
    </div>
@endsection