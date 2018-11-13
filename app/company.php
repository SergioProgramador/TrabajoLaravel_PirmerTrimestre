<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = ['id', 'name', 'city', 'cp'];

    public function companies_petitions(){
        return $this->belongsTo('App\Petition');
    }

    

}
