<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function managerAnimals()
    {
        return $this->hasMany('App\Animal', 'manager_id', 'id');
    }
 
    public function managerSpecie()
    {
        return $this->belongsTo('App\Specie', 'specie_id', 'id');
    }
 
 
}
