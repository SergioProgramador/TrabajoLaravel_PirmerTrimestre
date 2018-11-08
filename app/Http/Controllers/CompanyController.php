<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    //FUNCION QUE DEVUELVE LA VISTA CREATE
    public function create(){
        return view('company.create');
    }

    public function index()
    {
        $companies = Company::orderBy('id')->paginate();
                        
        return view('company.index',compact('companies'));
    }  
    
    //METODO EDITAR
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();

        return view('company.edit', compact('company', 'id'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $company = new Company();
        $data = $this->validate($request, [
            'name'=>'required',
            'ciudad'=> 'required',
            'cp'=> 'required'

        ]);
        $data['id'] = $id;
        $company->updateCompany($data);

        return redirect('/listcompanies')->with('success', 'Los datos de la empresa han sido actualizados.');
    }
    

    //CREAR UNA EMPRESA
    public function store(Request $request)
    {
        
        $company = new Company(array(
            'name' => $request->get('name'),
            'city' => $request->get('city'),
            'cp' => $request->get('cp')
        ));

        $company->save();
        return redirect('/listcompanies')->with('status','Has creado una nueva empresa.');
    }

}
