@extends('templates.template')

@section('content')
    <h1 class="text-center">Editar Pedido</h1>
    <hr/>
    <div class="col-8 m-auto">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center alert alert-danger" role="alert">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br/>
                @endforeach
            </div>
        @endif
        <form name="editar_pedido" id="editar_pedido" method="post" action="{{url("pedidos/$pedido->id")}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="produto" class="form-label">Produto *</label>
                <input type="text" class="form-control" name="produto" id="produto" value="{{$pedido->produto}}" required/>
            </div>
            <div class="row">
                <div class="col">
                    <label for="valor" class="form-label">Valor *</label>
                    <input type="number" class="form-control" name="valor" id="valor" value="{{$pedido->valor}}" step="0.01" min="0.01" placeholder="0,00" required/>
                </div>
                <div class="col">
                    <label for="data" class="form-label">Data *</label>
                    <input type="date" class="form-control" name="data" id="data" value="{{date('Y-m-d', strtotime($pedido->data))}}" min="1800-01-01" max="2024-12-31" placeholder="MM/DD/YYYY" required/>
                </div>
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente *</label>
                <select class="form-select" id="cliente" name="cliente_id" required>
                    <option selected value="{{$pedido->cliente_id}}">{{$pedido->relCliente->nome}}</option>
                    @foreach($clientes as $cliente)
                        @if($cliente->id != $pedido->cliente_id)
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <label>Ativo</label><br>
                    <input type="radio" id="sim" name="ativo" value="1" @if($pedido->ativo == '1') checked @endif><label for="sim">&nbsp;sim</label><br>
                    <input type="radio" id="não" name="ativo" value="0" @if($pedido->ativo == '0') checked @endif><label for="não">&nbsp;não</label>
                </div>
                <div class="col">
                    <label for="pedidos_status_id" class="form-label">Status</label>
                    <select class="form-select" id="pedidos_status_id" name="pedidos_status_id">
                        <option selected value="{{$pedido->pedidos_status_id}}">{{$pedido->relStatus->descricao}}</option>
                        @foreach($statuses as $status)
                            @if($status->id != $pedido->pedidos_status_id)
                                <option value="{{$status->id}}">{{$status->descricao}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>          
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
@endsection()