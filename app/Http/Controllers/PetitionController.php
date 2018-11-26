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
        $date_1=$request->get('date1');
        $date_2=$request->get('date2');

        if(!is_null($date_1) && !is_null($date_2)){
            $petitions = Petition::whereBetween('created_at', [$date_1, $date_2])->orderBy('type')->with('petitions_companies', 'petitions_grades')->get();
        }else{
            $petitions = Petition::with('petitions_companies', 'petitions_grades')->get();
        }
         
        $grades = Grade::All();
        return view('petition.list',compact('petitions', 'grades'));
    }

    public function list2(Request $request)
    {  
        $grado = $request->get('id_grade');

        if(!is_null($grado)){
            $petitions = Petition::where('id_grade', $grado)->orderBy('type')->with('petitions_companies', 'petitions_grades')->get(); 
        }else{

            $petitions = Petition::with('petitions_companies', 'petitions_grades')->get();
        }

        $grades = Grade::All();
    
        return view('petition.list2',compact('petitions', 'grades'));
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
        $request->session()->flash('alert-success', 'Petition was successful added!');
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
        $companies = Company::all();
        $grades = Grade::all();
        $petition = Petition::find($id);
        return view('petition.edit', compact('petition', 'id', 'companies', 'grades'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $companies = Company::all();
        $grades = Grade::all();
        $petition = Petition::find($id);
        $petition -> id_company = $request -> id_company;
        $petition -> id_grade = $request -> id_grade;
        $petition -> type = $request -> type;
        $petition -> n_students = $request -> n_students;
        
        $request->session()->flash('alert-success', 'Petition was successful edited!');
        $petition -> save();

        return view('petition.index', compact('petition', 'companies', 'grades', 'id'));
    }

    //ELIMINAR UNA PETICION
    public function destroy(Request $request, $id)
    {
        $petition = Petition::find($id);
        $petition->delete();
        $request->session()->flash('alert-success', 'Petition was eliminated!');
        return back();
    }

    
}
