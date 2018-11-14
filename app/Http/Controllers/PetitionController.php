<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petition;
use App\Company;
use App\Grade;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::orderBy('id')->paginate();           
        return view('petition.index',compact('petitions'));
    } 

    //CREAR UNA PETICION
    public function store(Request $request)
    { 
        $petition = new Petition(array(
            'id_company' => $request->get('id_company'),
            'id_grade' => $request->get('id_grade'),
            'type' => $request->get('type'),
            'n_students' => $request->get('n_students')
        ));

        $petition->save();
        return redirect('/listpetitions')->with('succes', 'HAS CREADO UNA NUEVA PETICION!!');
    }

    //FUNCION QUE DEVUELVE LA VISTA CREATE
    public function create(){
        $companies = Company::all();
        $grades = Grade::all();
        return view('petition.create', compact('companies', 'grades'));
    }

    
}
