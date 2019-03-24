<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    //


    public function groupe()

    {





        return $this->belongsTo('App\Groupe');
    }

}
