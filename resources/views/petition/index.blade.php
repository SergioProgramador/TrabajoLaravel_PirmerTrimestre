@extends('layouts.app')

@section('content')
<div class="container">
    <h3>LISTADO DE SOLICITUDES</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
              <td><strong>ID</strong></td>
              <td><strong>NOMBRE</strong></td>
              <td><strong>CIUDAD</strong></td>
              <td><strong>CÓDIGO POSTAL</strong></td>
              <td colspan="2"><strong>ACCIÓN</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->city}}</td>
                <td>{{$company->cp}}</td>
                    <td><a href="{{action('CompanyController@edit', $company->id)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="delcompany/{{$company->id}}" method="post">
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
       <a href="{{url('/addcompany')}}" class="btn btn-success">Crear una Empresa</a>
    </div>
</div>
<div>
@endsection