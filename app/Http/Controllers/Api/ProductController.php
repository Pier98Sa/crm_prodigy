<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        //diamo una path assoluta alle immagini
        foreach($products as $product){
            if ($product->image) {
                $product->image = url('storage/'.$product->image);
            } else {
                $product->image = url('img/placeholder.jpg');
            }
        }

        //ritorno un file Json che poi passerò al Front
        return response()->json(
            [
                'result' => $products,
                'success'=> true
            ]
        );
    }

    
}
