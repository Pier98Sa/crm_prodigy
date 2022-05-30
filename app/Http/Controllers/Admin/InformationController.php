<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Information;
use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //recupero le information del singolo cliente
        $user = $request->id;
        $informations = Information::where('client_id',$user)->get();
        $clients = Client::where('id',$user)->get();
        //salvo il l'id
        request()->session()->put('id_client',$user);
        
        return view('admin.informations.index', compact('informations','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $typologies = Typology::all();
        return view('admin.informations.create', compact('typologies'));
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
                'title' => 'required|min:2' ,
                'comment' => 'required|min:10',
                'deadline' => 'required|date',
                'typology_id'=>'required|exists:typologies,id'
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        $data['user_id'] = Auth::id();
        //recupero l'id salvato
        $id = (request()->session()->get('id_client'));
        $data['client_id'] = $id;

        $information = new Information();
        $information->fill($data);
        $information->save();

        return redirect()->route('admin.informations.index',['id' => $id])->with('message', 'Information correctly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('admin.informations.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        $typologies = Typology::all();
        return view('admin.informations.edit', compact('information','typologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        //validazione
        $request->validate(
            [
                'title' => 'required|min:2' ,
                'comment' => 'required|min:10',
                'deadline' => 'required|date',
                'typology_id'=>'required|exists:typologies,id'
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        $data['user_id'] = Auth::id();

        $id = (request()->session()->get('id_client'));
        $data['client_id'] = $id;

        $information->fill($data);
        $information->save();

        return redirect()->route('admin.informations.index',['id' => $id])->with('message', 'Information correctly edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $id = (request()->session()->get('id_client'));
        $information->delete();
        return redirect()->route('admin.informations.index',['id' => $id])->with('message', 'Information correctly cancelled');
    }
}
