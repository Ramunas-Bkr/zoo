<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function animalSpecie()
    {
        return $this->belongsTo('App\Specie', 'specie_id', 'id');
    }
    public function animalManager()
    {
        return $this->belongsTo('App\Manager', 'manager_id', 'id');
    }
}
