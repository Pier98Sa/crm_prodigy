<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->id;

        if($user == null){
            $quotes = Quote::all();
            return view('admin.quotes.index', compact('quotes'));
        }else{
            $quotes = Quote::where('client_id',$user)->get();
            return view('admin.quotes.index', compact('quotes'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->id;
        request()->session()->put('client_quotes_id',$user);
        $products =  Product::all();
        $clients = Client::where('id',$user)->get();
        return view('admin.quotes.create', compact('products','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate(
            [
                'comment' => 'required|min:10',
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        $products = $data['products'];
        
        $totalPrice = null;

        foreach ($products as $product) {
            $product_price = Product::where('id',$product)->get();
            foreach($product_price as $el){
                $el_price = $el->price;

                $totalPrice += $el_price;
            }
        }

        $id = (request()->session()->get('client_quotes_id'));
        $quote = new Quote();

        $quote->comment = $data['comment'];
        $quote->price = $totalPrice;
        $quote->client_id = $id;
        $quote->save();

        $quote->products()->sync($data['products']);

        /* return redirect()->route('admin.informations.index',['id' => $id])->with('message', 'Information correctly added'); */
        return redirect()->route('admin.clients.show', $id)->with('message', 'Quote correctly added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Quote $quote)
    {
        $products =  Product::all();
        return view('admin.quotes.edit', compact('products','quote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //validation
        $request->validate(
            [
                'comment' => 'required|min:10',
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        $products = $data['products'];
        
        $totalPrice = null;

        foreach ($products as $product) {
            $product_price = Product::where('id',$product)->get();
            foreach($product_price as $el){
                $el_price = $el->price;

                $totalPrice += $el_price;
            }
        }

        $id = (request()->session()->get('client_quotes_id'));

        $quote->comment = $data['comment'];
        $quote->price = $totalPrice;
        $quote->client_id = $id;
        $quote->save();

        $quote->products()->sync($data['products']);

        /* return redirect()->route('admin.informations.index',['id' => $id])->with('message', 'Information correctly added'); */
        return redirect()->route('admin.quotes.index')->with('message', 'Quote correctly changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('message', 'Quote correctly removed');
    }

}
