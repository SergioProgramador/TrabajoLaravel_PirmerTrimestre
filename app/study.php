<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class study extends Model
{
    protected $table = 'studies';
    protected $fillable = ['id_student', 'id_grade'];
    
    public function student(){
        return $this->hasMany(Student::class, 'id_student'); 
    }

}
