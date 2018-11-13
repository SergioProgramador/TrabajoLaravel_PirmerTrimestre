@extends('layouts.app')

@section('content')



<div class="container">
    <h3>STUDENT LIST</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
              <td><strong>ID</strong></td>
              <td><strong>NAME</strong></td>
              <td><strong>LASTNAME</strong></td>
              <td><strong>AGE</strong></td>
              <td colspan="2"><strong>Action</strong></td>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->lastname}}</td>
                <td>{{$student->age}}</td>
                    <td><a href="{{action('StudentController@edit', $student->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="delstudent/{{$student->id}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
    <div class="row">
       <a href="{{url('/addstudent')}}" class="btn btn-success">Add an student</a>
    </div>
</div>
<div>
@endsection

