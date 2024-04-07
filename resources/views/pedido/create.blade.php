@extends('templates.template')

@section('content')
    <h1 class="text-center">Novo Pedido</h1>
    <hr/>
    <div class="col-8 m-auto">
    @if(isset($errors) && count($errors)>0)
        <div class="text-center alert alert-danger" role="alert">
            @foreach($errors->all() as $erro)
                {{$erro}}<br/>
            @endforeach
        </div>
    @endif
    <form name="cadastro_pedido" id="cadastro_pedido" method="post" action="{{url('pedidos')}}">
            @csrf
            <div class="mb-3">
                <label for="produto" class="form-label">Produto *</label>
                <input type="text" class="form-control" name="produto" id="produto" required/>
            </div>
            <div class="row">
                <div class="col">
                    <label for="valor" class="form-label">Valor *</label>
                    <input type="number" class="form-control" name="valor" id="valor" step="0.01" min="0.01" placeholder="0,00" required/>
                </div>
                <div class="col">
                    <label for="data" class="form-label">Data *</label>
                    <input type="date" class="form-control" name="data" id="data" min="1800-01-01" max="2024-12-31" placeholder="MM/DD/YYYY" required/>
                </div>
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente *</label>
                <select class="form-select" id="cliente" name="cliente_id" required>
                    <option selected>Selecione</option>
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection()