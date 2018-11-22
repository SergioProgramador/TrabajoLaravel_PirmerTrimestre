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
    <form method="POST" action="{{url('editstudent')}}/{{$student->id}}" >
        {{csrf_field()}}
        {{method_field('PUT')}}
        <!--<input name="_method" type="hidden" value="PUT">-->
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value={{$student->name}} />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" name="lastname" value={{$student->lastname}} />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="age">Age:</label>
            <input type="text" class="form-control" name="age" value={{$student->age}} />
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{url('/liststudent')}}" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
@endsection


