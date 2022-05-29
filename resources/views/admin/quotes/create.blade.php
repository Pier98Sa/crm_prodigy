@extends('admin.layouts.app')

@section('pageTitle','CRM - new quotes')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($clients as $client )
                    <h1>Created quote for {{$client->business_name}}</h1>
                @endforeach
                <span>Marked fields(*) are required</span>

            <form method="POST" action="{{route('admin.quotes.store')}}" class="mt-2">
                @csrf

                    <div class="form-group">
                        <label for="comment">Comment <strong>*</strong>
                            <small class="d-block">Write at least 10 characters</small>
                        </label>
                        <textarea  class="form-control" name="comment" id="comment" cols="30" rows="10" required>{{old('comment')}}</textarea>
                    </div>

                    <div class="form-group ">
                        <label for="product_list" class="col-md-3 col-form-label">Products<strong>*</strong>
                            <small class="d-block">select at least 1 product</small>
                        </label>
                        
                        
                        <div class="col-md-6 pl-5">
                            
                            @foreach ($products as $product)
                            <div class="col align-content-stretch">
                                <input class="form-check-input control-check" type="checkbox" name="products[]" id="product_{{$product->id}}" {{in_array($product->id, old("products", [])) ? 'checked' : ''}} value="{{$product->id}}">
                                    <label class="form-check-label" for="product_{{$product->id}}"><strong>{{$product->name}}</strong> {{$product->price}} &euro;</label>    
                                </div>
                            @endforeach
                            
                        </div>
                        
                    </div>
                    

                    

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            </div>
        </div>
    </div>
@endsection