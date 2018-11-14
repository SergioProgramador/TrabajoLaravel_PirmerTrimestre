@extends('layouts.app')

@section('content')
<div class="container">
    <h3>LISTADO DE SOLICITUDES</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
              <td><strong>COMPANY</strong></td>
              <td><strong>GRADE</strong></td>
              <td><strong>TYPE</strong></td>
              <td><strong>Nº STUDENTS</strong></td>
              <td colspan="2"><strong></strong>ACTION</td>
            </tr>
        </thead>
        <tbody>
            @foreach($petitions as $petition)
                <tr>
                    <td>{{$petition->petitions_companies->name}}</td>
                    <td>{{$petition->petitions_grades->name}}</td>
                    <td>{{$petition->type}}</td>
                    <td>{{$petition->n_students}}</td>
                        <td><a class="btn btn-primary">Editar</a></td>
                    <td>
                        <form method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>   
                </tr>
            @endforeach    
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <a href="{{url('/addpetition')}}" class="btn btn-success">Create Petition</a>
        </div>
    </div>
</div>
@endsection