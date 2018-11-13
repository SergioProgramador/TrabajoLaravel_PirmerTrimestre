<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    protected $fillable = ['name', 'level'];
    public function updateGrade($data)
{
        
        $this->name = $data['name'];
        $this->level = $data['level'];
        $this->save();
        return 1;
}
}

