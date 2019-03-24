<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    public function profils()

    {


        return $this->hasMany('App\Profil');
    }


}
