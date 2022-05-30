<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lead_id = $request->id;
        if($lead_id == null){
            return view('admin.clients.create');
        }else{
            $lead_coll = Lead::where('id',$lead_id)->get();
            $lead = $lead_coll[0];
            return view('admin.clients.create', compact('lead'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione
        $request->validate(
            [
                'image' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
                'business_name' => 'required|min:2' ,
                'address' => 'required|min:2',
                'city' => 'required|min:2',
                'postal_code' => 'required|numeric|min:5',
                'email' => 'required|email',
                'phone_number' => 'required|min:9',
                'vat_number' => 'required|string|size:11',
                'iban' => 'required|string|size:27',
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        if(isset($data['image'])){
            $img_clients = Storage::put('img_clients', $data['image']);
            $data['image'] = $img_clients;
        }

        $data['user_id'] = Auth::id();

        $client = new Client();
        $client->fill($data);
        $client->save();

        return redirect()->route('admin.clients.index')->with('message', 'Client correctly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //validazione
        $request->validate(
            [
                'image' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
                'business_name' => 'required|min:2' ,
                'address' => 'required|min:2',
                'city' => 'required|min:2',
                'postal_code' => 'required|numeric|min:5',
                'email' => 'required|email',
                'phone_number' => 'required|min:9',
                'vat_number' => 'required|string|size:11',
                'iban' => 'required|string|size:27',
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        if(isset($data['image'])){
            $img_clients = Storage::put('img_clients', $data['image']);
            $data['image'] = $img_clients;
        }

        $client->update($data);
        $client->save();

        return redirect()->route('admin.clients.index')->with('message', 'Client correctly edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if ($client->image) {
            Storage::delete($client->image);
        }
        $client->delete();
        return redirect()->route('admin.clients.index')->with('message', 'Client correctly deleted');
    }
}
