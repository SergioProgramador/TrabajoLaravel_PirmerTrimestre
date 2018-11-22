@extends('layouts.app')

@section('content')
<div class="container">
<h3>PETICIONES ORDENADAS POR FECHA</h3>

    <form class="navbar-form navbar-left pull-right" role="search">
        <div class="form-group">
            <input type="date" class="form-control" data-date-format="YYYY MM DD">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
    </form> 

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
                    <td>{{$petition->created_at}}</td>  
                </tr>
            @endforeach    
        </tbody>
    </table>

</div>
<br>
<br>
<br>



<div class="container">
    <h3>PETICIONES POR CADA CICLO</h3>
    <!--
        !!Form::open 'route'=>'lists', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'!!
    
    -->
    <form class="navbar-form navbar-left pull-right" role="search">
        <div class="form-group">
            <select name="id_grade">
                <option></option>
                @foreach($grades as $grade)
                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
    </form> 
    <!--
        !!Form::close!!
        
    -->
    

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
                    <td>{{$petition->created_at}}</td>  
                </tr>
            @endforeach    
        </tbody>
    </table>
</div>
@endsection


    
