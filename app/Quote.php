<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable =['comment','price','client_id'];

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
