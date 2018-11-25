@extends('layouts.app')

@section('content')
<div class="container">
    <h3 style="text-align: center">COMPANY'S LIST</h3>
    <br/>

    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
        {{ Session::get('alert-' . $msg) }} 
    @endif @endforeach
    
    <div style="text-align: center">
        <table class="table">
            <thead>
                <tr class="bg-success">
                <td><strong>NAME</strong></td>
                <td><strong>CITY</strong></td>
                <td><strong>CP</strong></td>
                <td colspan="2"><strong>ACTION</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->city}}</td>
                    <td>{{$company->cp}}</td>
                    <td><a href="{{action('CompanyController@edit', $company->id)}}" class="btn btn-primary" >Edit</a></td>
                    
                    <td>
                        <form action="delcompany/{{$company->id}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar la petición?')">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
    <div class="row">
       <a href="{{url('/addcompany')}}" class="btn btn-success">Create Company</a>
    </div>
<br>
</div>
<div>
@endsection

