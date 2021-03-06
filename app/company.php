<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';
    protected $fillable = ['id', 'name', 'city', 'cp'];

    public function companies_petitions(){
        return $this->hasMany(Petition::class);
    }

    

}
