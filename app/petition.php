<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petition extends Model
{
    protected $fillable = ['id', 'id_company', 'id_grade', 'type', 'n_students'];
}
