<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class GradeController extends Controller
{
    /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
public function create()
{
   return view('user.create');
}
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = new Grade();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
       
        $grade->saveGrade($data);
        return redirect('/home')->with('success', 'New grade has been created! Wait sometime to get resolved');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('grade.index',compact('grades'));
    }
}
