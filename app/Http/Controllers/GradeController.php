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
        $grade = Grade::find($id);
        return view('grade.edit', compact('grade', 'id'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);
        $grade -> name = $request -> name;
        $grade -> level = $request -> level;
        
        $grade -> save();
        return redirect('/listgrade')->with('success', 'Grade has been succefully updated!');
    }
    

    //CREAR UNA GRADE
    public function store(Request $request)
    {
        
        $grade = new Grade(array(
            'name' => $request->get('name'),
            'level' => $request->get('level')
        ));

        $grade->save();
        return redirect('/listgrade')->with('status','You have created a new grade.');
    }
    //ELIMINAR UNA GRADE
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        return back();
    }
}
