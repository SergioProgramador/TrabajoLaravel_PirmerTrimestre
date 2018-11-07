@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
   
    <div class="row">
       <a href="{{url('/addcompany')}}" class="btn btn-success">Crear Empresa</a>
       <a href="{{url('/listcompanies')}}" class="btn btn-default">Listado de Empresas</a>
    </div>
    <div class="row">
        <a href="{{url('/create/ticket')}}" class="btn btn-success">Create Ticket</a>
        <a href="{{url('/tickets')}}" class="btn btn-default">All Tickets</a>
     </div>
</div>
@endsection
