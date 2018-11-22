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
        $petitions = Petition::with('petitions_companies', 'petitions_grades')->get();           
        return view('petition.index',compact('petitions'));
    } 

    public function list1(Request $request)
    {
        $grades = Grade::all();
        $petitions = Petition::with('petitions_companies', 'petitions_grades')->get(); 
        $pet=Petition::grade($request->get('id_grade'))->orderBy('id')->paginate();
        return view('petition.list',compact('petitions', 'grades', 'pet'));
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

    //METODO EDITAR
    public function edit($id)
    {
        $petition = Petition::find($id);
        return view('petition.edit', compact('petition', 'id'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $petition = Petition::find($id);
        $petition -> id_company = $request -> id_company;
        $petition -> id_grade = $request -> id_grade;
        $petition -> type = $request -> type;
        $petition -> n_students = $request -> n_students;
        
        $petition -> save();
        return redirect('/listpetitions')->with('success', 'HAS ACTUALIZADO LA SOLICITUD!!');
    }

    //ELIMINAR UNA PETICION
    public function destroy($id)
    {
        $petition = Petition::find($id);
        $petition->delete();

        return back();
    }

    
}
