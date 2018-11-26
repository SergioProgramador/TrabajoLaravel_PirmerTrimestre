@extends('layouts.app')

@section('content')
<div class="container">
    <h3 style="text-align: center">PETITION'S LIST</h3>
    <br>
    
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
        {{ Session::get('alert-' . $msg) }} 
    @endif @endforeach

    <div style="text-align: center">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="bg-success">
                <td><strong>COMPANY</strong></td>
                <td><strong>GRADE</strong></td>
                <td><strong>TYPE</strong></td>
                <td><strong>Nº STUDENTS</strong></td>
                <td><strong>CREATION DATE</strong></td>
                <td colspan="2"><strong>ACTION</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach($petitions as $petition)
                    <tr>
                        <td>{{$petition->petitions_companies->name}}</td>
                        <td>{{$petition->petitions_grades->name}}</td>
                        <td>{{$petition->type}}</td>
                        <td>{{$petition->n_students}}</td>
                        <td>{{$petition->created_at->format('d-m-Y')}}</td>
                        <td><a href="{{action('PetitionController@edit', $petition->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="delpetition/{{$petition->id}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar la petición?')">Delete</button>
                        </form>
                        </td>   
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row">
            <a href="{{url('/addpetition')}}" class="btn btn-success">Create Petition</a>
        </div>
    </div>
</div>
@endsection