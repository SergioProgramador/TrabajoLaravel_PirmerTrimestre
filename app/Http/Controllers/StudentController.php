<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Grade;
use App\Study;
class StudentController extends Controller
{
    //FUNCION QUE DEVUELVE LA VISTA CREATE
    public function create(){
        $grades = Grade::all();
        $studies = Study::all();
        return view('student.create', compact('grades','studies'));
    }

    public function index()
    {
        $students = Student::orderBy('id')->paginate();              
        return view('student.index',compact('students'));
    }  
    
    //METODO EDITAR
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student', 'id'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student -> name = $request -> name;
        $student -> lastname = $request -> lastname;
        $student -> age = $request -> age;
        
        $student -> save();
        return redirect('/liststudent')->with('success', 'Student has been succefully updated!');
    }
    

    //CREAR UNA STUDENT
    public function store(Request $request)
    {
        
        $student = new Student(array(
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'age' => $request->get('age'),
        ));

        $study = new Study(array(
            'id_grade'=> $request->get('id_grade'),
        ));

        $student->save();
        $study->save();

        return redirect('/liststudent')->with('status','You have created a new student.');
    }
    //ELIMINAR UN STUDENT
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return back();
    }
}
