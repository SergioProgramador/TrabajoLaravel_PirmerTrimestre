@extends('layouts.app')

@section('content')
<div class="container">
    <h3 style="text-align: center">GRADES'S LIST</h3>
    <br>
    <div style="text-align: center">
        <table class="table table-striped table-hover">
            <thead class="bg-success">
                <tr>
                <td><strong>NAME</strong></td>
                <td><strong>LEVEL</strong></td>
                <td colspan="2"><strong>ACTION</strong></td>
                </tr>
            </thead>
            <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td>{{$grade->name}}</td>
                    <td>{{$grade->level}}</td>
                        <td><a href="{{action('GradeController@edit', $grade->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="delgrade/{{$grade->id}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
    <div class="row">
       <a href="{{url('/addgrade')}}" class="btn btn-success">Create a grade</a>
    </div>
</div>
<div>
@endsection

