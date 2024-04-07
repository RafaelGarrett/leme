@extends('templates.template')

@section('content')
    <h1 class="text-center">Clientes</h1>
    <hr/>
    <div class="col-8 m-auto">
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <th scope="row">{{$cliente->id}}</th>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->cpf}}</td>
                        <td>{{ \Carbon\Carbon::parse($cliente->data_nasc)->format('d/m/Y')}}</td>
                        <td>{{$cliente->telefone}}</td>
                        <td>@if ($cliente->ativo === 1) sim @else não @endif</td>
                        <td>
                            <a href="{{url("clientes/$cliente->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="{{url("clientes/$cliente->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection()