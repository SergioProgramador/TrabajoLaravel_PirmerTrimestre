@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Name</td>
              <td>Level</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
            <tr>
                <td>{{$grade->name}}</td>
                <td>{{$grade->level}}</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection