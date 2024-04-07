@extends('templates.template')

@section('content')
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link " href="{{url('/clientes/create')}}">cadastros de clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/clientes')}}">visualizar clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/pedidos/create')}}">cadastros de pedidos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/pedidos')}}">visualizar pedidos</a>
        </li>
    </ul>
@endsection()
