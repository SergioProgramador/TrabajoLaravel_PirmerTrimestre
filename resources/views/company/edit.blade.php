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
    <div class="row">
    <form method="post" action="{{action('CompanyController@update', $id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value={{$company->name}} />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="city">Ciudad:</label>
            <input type="text" class="form-control" name="city" value={{$company->city}} />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="cp">Codigo Postal:</label>
            <input type="text" class="form-control" name="city" value={{$company->cp}} />
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listcompanies')}}" class="btn btn-light">Cancelar</a>
        </form>
    </div>
</div>
@endsection