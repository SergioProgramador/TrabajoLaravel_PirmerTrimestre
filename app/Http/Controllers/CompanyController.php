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
        $company = Company::find($id);
        return view('company.edit', compact('company', 'id'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company -> name = $request -> name;
        $company -> city = $request -> city;
        $company -> cp = $request -> cp;

        $company -> save();
        return redirect('/listcompanies')->with('success', 'HAS ACTUALIZADO LA EMPRESA!!');
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
        return redirect('/listcompanies')->with('succes', 'HAS CREADO UNA NUEVA EMPRESA!!');
    }

    //ELIMINAR UNA EMPRESA
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return back();
    }

}
