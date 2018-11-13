<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petition;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::orderBy('id')->paginate();           
        return view('petition.index',compact('petitions'));
    } 
}
