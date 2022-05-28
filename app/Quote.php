<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable =['comment','price'];

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
