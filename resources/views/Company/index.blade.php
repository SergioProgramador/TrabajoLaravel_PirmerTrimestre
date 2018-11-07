@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>City</td>
              <td>Cp</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->city}}</td>
                <td>{{$company->cp}}</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection