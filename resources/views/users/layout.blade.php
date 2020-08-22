@extends('adminlte::page')

@section('title', 'Pronto')

@section('content_header')
    <h1 class="m-0 text-dark">Usuários</h1>
@stop

@section('content-adminlte')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@stop


