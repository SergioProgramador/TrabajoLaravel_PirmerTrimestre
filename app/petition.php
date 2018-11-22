<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{

    protected $table = 'petitions';
    protected $fillable = ['id', 'id_company', 'id_grade', 'type', 'n_students'];

    public function petitions_companies(){
        return $this->belongsTo(Company::class, 'id_company'); 
    }

    public function petitions_grades(){
        return $this->belongsTo(Grade::class, 'id_grade');
    }


    public function scopeGrade ($query, $idgrade){
        $query->where('id_grade', $idgrade);
    }

    
}
