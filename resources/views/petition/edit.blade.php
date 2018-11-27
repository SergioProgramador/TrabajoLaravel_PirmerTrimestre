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
    <form method="POST" action="{{url('editpetition')}}/{{$petitions->id}}" >
        {{csrf_field()}}
        {{method_field('PUT')}}
        <!--<input name="_method" type="hidden" value="PUT">-->
        
        <div class="form-group">
            <label for="id_company">Company</label>
            <select class="form-control" name="id_company" style="width:200px" required>
                    <option></option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_grade">Grade</label>
            <select class="form-control" name="id_grade" style="width:200px" required>
                    <option></option>
                @foreach($grades as $grade)
                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">   
            <label for="type">Type</label>
            <select class="form-control" name="type" style="width:200px" required>
                <option></option>
                <option value="dual">Dual</option>
                <option value="contract">Contract</option>
                <option value="fct">FCT</option>
            </select>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="n_students">Nº Students:</label>
            <input type="text" class="form-control" name="n_students" value={{$petitions->n_students}} style="width:200px" required/>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{url('/listpetitions')}}" class="btn btn-light">Cancel</a>
        </form>
    
    </div>
</div>
@endsection