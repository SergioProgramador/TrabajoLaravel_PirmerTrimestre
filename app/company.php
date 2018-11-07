<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = ['id', 'name', 'city', 'cp'];

    public function store(Request $request)
    {
        $company = new company();
        $data = $this->validate($request, [
            'name'=>'required',
            'city'=> 'required',
            'cp'=> 'required'
        ]);
        $company->saveCompany($data);
        return redirect('/home')->with('success', 'Has creado una nueva empresa!');
    }

    public function saveTicket($data)       
    {
        $this->id = auth()->company()->id;
        $this->name = $data['name'];
        $this->city = $data['city'];
        $this->cp = $data['cp'];
        $this->save();
        return 1;   
    }
}
