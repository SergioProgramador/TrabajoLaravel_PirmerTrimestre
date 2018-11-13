@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach   
        </ul>
    </div><br />
@endif

@if (session()->has('succes'))
    <div class="alert alert-succes" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row">
<form method="post" action="{{url('/addcompany')}}">
    <div class="form-group">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <label for="name">Nombre de la Empresa:</label>
        <input type="text" class="form-control" name="name"/>
    </div>
        
    <div class="form-group">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <label for="city">Ciudad:</label>
        <input type="text" class="form-control" name="city"/>
    </div>

    <div class="form-group">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <label for="cp">Codigo Postal:</label>
        <input type="text" class="form-control" name="cp"/>
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{url('/listcompanies')}}" class="btn btn-light">Cancelar</a>

    </form>
</div>
</div>
@endsection