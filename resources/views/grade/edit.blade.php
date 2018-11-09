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
    <form method="post" action="update/"{{$id}} >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value={{$grade->name}} />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="level">Level:</label>
            <input type="text" class="form-control" name="level" value={{$grade->level}} />
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
       
        </form>
    </div>
</div>
@endsection