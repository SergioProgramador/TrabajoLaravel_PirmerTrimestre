<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create(){
        return view('company.create');
    }

    public function index()
    {
        $companies = company::where('id', auth()->company()->id)->get();
        
        return view('company.index',compact('companies'));
    }   
}
