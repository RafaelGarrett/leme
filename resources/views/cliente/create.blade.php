@extends('templates.template')

@section('content')
    <h1 class="text-center">Novo Cliente</h1>
    <hr/>
    <div class="col-8 m-auto">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center alert alert-danger" role="alert">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br/>
                @endforeach
            </div>
        @endif
        <form name="cadastro_cliente" id="cadastro_cliente" method="post" action="{{url('clientes')}}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome *</label>
                <input type="text" class="form-control" name="nome" id="nome" required/>
            </div>
            <div class="row">
                <div class="col">
                    <label for="cpf" class="form-label">CPF *</label>
                    <input type="text" placeholder="000.000.000-00" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"class="form-control" name="cpf" id="cpf" required/>
                </div>
                <div class="col">
                    <label for="data_nasc" class="form-label">Data de nascimento *</label>
                    <input type="date" class="form-control" name="data_nasc" id="data_nasc" min="1800-01-01" max="2024-12-31" required/>
                </div>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" class="form-control" id="telefone" name="telefone" placeholder="(99) 99999-9999"/>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection()