<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = ['id', 'name', 'city', 'cp'];

    public function updateCompany($data)
    {
        $company = $this->find($data['id']);
        $company->id = auth()->company()->id;
        $company->name = $data['name'];
        $company->city = $data['city'];
        $company->cp = $data['cp'];
        $company->save();
        return 1;
    }

}
