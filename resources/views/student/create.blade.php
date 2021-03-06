@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{url('/addstudent')}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" style="width:200px"/>
        </div>
        
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" name="lastname" style="width:200px"/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="age">Age:</label>
            <input type="text" class="form-control" name="age" style="width:200px"/>
        </div>
        <div class="form-group">
        <label for="id_grade">Grade</label>
        <select class="form-control" name="id_grade">
            @foreach($grades as $grade)
                <option value="{{$grade->id}}">{{$grade->name}}</option>
            @endforeach
        </select>
    </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{url('/liststudent')}}" class="btn btn-light">Cancel</a>

        </form>
    </div>
</div>
@endsection