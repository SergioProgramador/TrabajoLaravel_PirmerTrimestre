@extends('layouts.app')

@section('content')



<div class="container">
    <h3 style="text-align: center">STUDENTS'S LIST</h3>
    <br>
    <div style="text-align: center">
        <table class="table table-striped table-hover">
            <thead class="bg-success">
                <tr>
                <td><strong>NAME</strong></td>
                <td><strong>LASTNAME</strong></td>
                <td><strong>AGE</strong></td>
                <td colspan="2"><strong>ACTION</strong></td>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->age}}</td>
                        <td><a href="{{action('StudentController@edit', $student->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="delstudent/{{$student->id}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Delete</button>
                        </form>
                    </td>   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
    <div class="row">
       <a href="{{url('/addstudent')}}" class="btn btn-success">Create Student</a>
    </div>
</div>
<div>
@endsection

