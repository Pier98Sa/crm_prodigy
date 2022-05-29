<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';
    protected $fillable =['title','comment','deadline','user_id','typology_id','client_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function typology(){
        return $this->belongsTo('App\Typology');
    }
    public function client(){
        return $this->belongsTo('App\Client');
    }
}
