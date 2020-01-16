<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    
    public function specieManagers()
    {
        return $this->hasMany('App\Manager', 'specie_id', 'id');
    }
    
    public function specieAnimals()
    {
        return $this->hasMany('App\Animal', 'specie_id', 'id');
    }
}
