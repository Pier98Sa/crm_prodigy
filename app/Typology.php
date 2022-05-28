<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    protected $fillable =['name','slug'];

    public function informations(){
        return $this->hasMany('App\Information');
    }
}
