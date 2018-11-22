@extends('layouts.app')

@section('content')
<div class="container">
<h3 style="text-align: center">PETICIONES ORDENADAS POR FECHA</h3>

    <form class="navbar-form navbar-left pull-right" role="search">
        <div class="form-group">
            <b>START DATE: </b><input type="date" class="form-control" id=date1 name=date1 value="{{ \Carbon\Carbon::tomorrow()->subYear()->format('Y-m-d') }}">
            <b>FINISH DATE: </b><input type="date" class="form-control" id=date2 name=date2  value="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
    </form> 

    <br/>
    <br/>
    <br/>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
              <td><strong>COMPANY</strong></td>
              <td><strong>GRADE</strong></td>
              <td><strong>TYPE</strong></td>
              <td><strong>Nº STUDENTS</strong></td>
              <td><strong>CREATION DATE</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach($petitions as $petition)
                <tr>
                    <td>{{$petition->petitions_companies->name}}</td>
                    <td>{{$petition->petitions_grades->name}}</td>
                    <td>{{$petition->type}}</td>
                    <td>{{$petition->n_students}}</td>
                    <td>{{$petition->created_at.format('Y-m-d')}}</td>  
                </tr>
            @endforeach    
        </tbody>
    </table>

</div>
@endsection



    
