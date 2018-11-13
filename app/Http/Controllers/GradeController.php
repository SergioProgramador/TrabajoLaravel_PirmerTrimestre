<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;

class GradeController extends Controller
{
    //FUNCION QUE DEVUELVE LA VISTA CREATE
    public function create(){
        return view('grade.create');
    }

    public function index()
    {
        $grades = Grade::orderBy('id')->paginate();
                        
        return view('grade.index',compact('grades'));
    }  
    
    //METODO EDITAR
    public function edit($id)
    {
        $grade = Grade::where('id', $id)->first();

        return view('grade.edit', compact('grade', 'id'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $grade = new Grade();
        $data = $this->validate($request, [
            'name'=>'required',
            'level'=> 'required'
        ]);
        $data['id'] = $id;
        $grade->updateGrade($data);

        return redirect('/listgrade')->with('success', 'Grade data has been updated.');
    }
    

    //CREAR UNA EMPRESA
    public function store(Request $request)
    {
        
        $grade = new Grade(array(
            'name' => $request->get('name'),
            'level' => $request->get('level')
        ));

        $grade->save();
        return redirect('/listgrade')->with('status','You have created a new grade.');
    }

}
