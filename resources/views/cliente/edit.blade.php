@extends('templates.template')

@section('content')
    <h1 class="text-center">Editar Cliente</h1>
    <hr/>
    <div class="col-8 m-auto">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center alert alert-danger" role="alert">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br/>
                @endforeach
            </div>
        @endif
        <form name="editar_cliente" id="editar_cliente" method="post" action="{{url("clientes/$cliente->id")}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome *</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$cliente->nome}}" required/>
            </div>
            <div class="row">
                <div class="col">
                    <label for="cpf" class="form-label">CPF *</label>
                    <input type="text" value="{{$cliente->cpf}}" placeholder="000.000.000-00" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"class="form-control" name="cpf" id="cpf" required/>
                </div>
                <div class="col">
                    <label for="data_nasc" class="form-label">Data de nascimento *</label>
                    <input type="date" value="{{date('Y-m-d', strtotime($cliente->data_nasc))}}" class="form-control" name="data_nasc" id="data_nasc" min="1800-01-01" max="2024-04-07" required/>
                </div>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" value="{{$cliente->telefone}}" class="form-control" id="telefone" name="telefone" placeholder="(99) 99999-9999"/>
            </div>
            <div class="mb-3">
                <label>Ativo</label><br>
                <input type="radio" id="sim" name="ativo" value="1" @if($cliente->ativo == '1') checked @endif><label for="sim">&nbsp;sim</label><br>
                <input type="radio" id="não" name="ativo" value="0" @if($cliente->ativo == '0') checked @endif><label for="não">&nbsp;não</label>              
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
@endsection()