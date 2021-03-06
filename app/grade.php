<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
    protected $fillable = ['name', 'level'];

    public function updateGrade($data)
    { 
        $this->name = $data['name'];
        $this->level = $data['level'];
        $this->save();
        return 1;
    }

    public function grades_petitions(){
        return $this->hasMany(Petition::class);
    }
    public function student(){
        return $this->hasMany(Student::class, 'id_student'); 
    }
}

