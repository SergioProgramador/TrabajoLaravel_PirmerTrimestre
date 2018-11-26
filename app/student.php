<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'petitions';
    protected $fillable = ['name', 'lastname', 'age' ];
  
    public function studies(){
        return $this->belongsTo(Study::class, 'id_study'); 
    }

    public function grades(){
        return $this->hasMany(Grade::class, 'id_grade');
    }
}
    