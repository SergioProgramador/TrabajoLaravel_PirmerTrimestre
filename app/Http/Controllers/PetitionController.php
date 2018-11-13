<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::orderBy('id')->paginate();           
        return view('petition.index',compact('petitions'));
    } 
}
