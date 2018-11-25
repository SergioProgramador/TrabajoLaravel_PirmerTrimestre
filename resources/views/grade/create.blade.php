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
    <form method="post" action="{{url('/addgrade')}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Grade Name:</label>
            <input type="text" class="form-control" name="name" style="width:200px"/>
        </div>
        
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="level">Level:</label>
            <input type="text" class="form-control" name="level" style="width:200px"/>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{url('/listgrade')}}" class="btn btn-light">Cancel</a>

        </form>
    </div>
</div>
@endsection