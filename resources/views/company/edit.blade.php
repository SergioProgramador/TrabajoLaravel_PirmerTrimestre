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
    <form method="POST" action="{{url('editcompany')}}/{{$company->id}}" >
        {{csrf_field()}}
        {{method_field('PUT')}}
        <!--<input name="_method" type="hidden" value="PUT">-->
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
            <input type="text" class="form-control" name="cp" value={{$company->cp}} />
        </div>
        </form>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listcompanies')}}" class="btn btn-light">Cancelar</a>
        
    </div>
</div>
@endsection





