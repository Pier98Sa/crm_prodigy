<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LeadController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //validazione backend dei dati inseriti
        $validator = Validator::make($data, [
            "name" => 'required',
            "email" => 'required|email',
            "phone_number" => 'required|max:15',
            "comment" => 'nullable'
        ]);

         //Se la validazione non va a buon fine, prelevo gli errori e li mostrerò in front
         if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
                'success' => false
            ]);
        }else{
            //Se la validazione passa, allora creo un nuovo oggetto Order nel DB, e faccio la sync della tabella pivot

            $lead = new Lead();
            $lead->fill($data);

            $lead->save();
        }
    }

    
}
