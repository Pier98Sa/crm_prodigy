<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable =['title','cooment','deadline'];

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
