@extends('layouts.print')

@section('content')
<div class="container">
    <h3 style="text-align: center">PETITIONS ORDER BY GRADES</h3>

    
    <br>
    <div style="text-align: center">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="bg-danger">
                <td><strong>COMPANY</strong></td>
                <td><strong>GRADE</strong></td>
                <td><strong>TYPE</strong></td>
                <td><strong>Nº STUDENTS</strong></td>
                <td><strong>CREATION DATE</strong></td>
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
                    </tr>
                @endforeach    
            </tbody>
        </table>
    <div>
</div>
@endsection