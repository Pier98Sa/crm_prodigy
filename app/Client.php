<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =['business_name','address','city','postal_code','email','phone_number','vat_number','iban'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function quotes(){
        return $this->hasMany('App\Quote');
    }

    public function informations(){
        return $this->hasMany('App\Information');
    }
}
