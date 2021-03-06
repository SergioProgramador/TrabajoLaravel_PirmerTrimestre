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
    </div><br/>
@endif
    <div class="row">
    <form method="POST" action="{{url('editcompany')}}/{{$company->id}}" >
        {{csrf_field()}}
        {{method_field('PUT')}}
        <!--<input name="_method" type="hidden" value="PUT">-->
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Company's Name:</label>
            <input type="text" class="form-control" name="name" value={{$company->name}} style="width:200px" required/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="city">City:</label>
            <input type="text" class="form-control" name="city" value={{$company->city}} style="width:200px" required/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="cp">CP:</label>
            <input type="text" class="form-control" name="cp" value={{$company->cp}} style="width:200px" required/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{url('/listcompanies')}}" class="btn btn-light">Cancel</a>
        </form>    
    </div>
</div>
@endsection





