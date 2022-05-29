@extends('admin.layouts.app')

@section('pageTitle','CRM - new quotes')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit quote for {{$quote->client->business_name}}</h1>
                
                <span>Marked fields(*) are required</span>

            <form method="POST" action="{{route('admin.quotes.update', $quote->id)}}" class="mt-2">
                @csrf
                @method('PUT')

                    <div class="form-group">
                        <label for="comment">Comment <strong>*</strong>
                            <small class="d-block">Write at least 10 characters</small>
                        </label>
                        <textarea  class="form-control" name="comment" id="comment" cols="30" rows="10" required>{{old('comment', $quote->comment)}}</textarea>
                    </div>

                    <div class="form-group ">
                        <label for="product_list" class="col-md-3 col-form-label">Products<strong>*</strong>
                            <small class="d-block">select at least 1 product</small>
                        </label>
                        
                        
                        <div class="col-md-6 pl-5">
                            
                            @foreach ($products as $product)

                                @if ($errors->any())
                                    <div class="custom-control custom-checkbox">
                                        <input name="products[]" type="checkbox" class="form-check-input control-check" id="product_{{$product->id}}" value="{{$product->id}}" {{in_array($product->id, old('products'))?'checked':''}}>
                                        <label class="form-check-label" for="product_{{$product->id}}"><strong>{{$product->name}}</strong> {{$product->price}} &euro;</label>  
                                    </div>
                                @else
                                    <div class="custom-control custom-checkbox">
                                        <input name="products[]" type="checkbox" class="form-check-input control-check" id="product_{{$product->id}}" value="{{$product->id}}" {{$quote->products->contains($product->id)?'checked':''}}  >
                                        <label class="form-check-label" for="product_{{$product->id}}"><strong>{{$product->name}}</strong> {{$product->price}} &euro;</label>  
                                    </div>
                                @endif

                            @endforeach
                            
                        </div>
                        
                    </div>
                    

                    

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
        </div>
    </div>
@endsection