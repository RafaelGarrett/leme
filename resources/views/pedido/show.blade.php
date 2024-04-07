@extends('templates.template')

@section('content')
    <h1 class="text-center">Pedido - {{$pedido->id}}</h1>
    <hr/>
    <div class="col-8 m-auto">
        <form>
            @php
                $cliente = $pedido->find($pedido->id)->relCliente;
                $pedido_status = $pedido->find($pedido->id)->relStatus;
                $valor = number_format($pedido->valor, 2);
            @endphp
            <div class="mb-3">
                <label for="produto" class="form-label">Produto</label>
                <input type="text" class="form-control" value="{{$pedido->produto}}" id="produto" disabled>
            </div>
            <div class="row">
                <div class="col">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" class="form-control" value="R${{$valor}}" id="valor" disabled/>
                </div>
                <div class="col">
                    <label for="data" class="form-label">Data</label>
                    <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($pedido->data)->format('d/m/Y')}}" id="data" disabled/>
                </div>
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" value="{{$cliente->nome}}" id="cliente" disabled/>
            </div>
            <div class="row">
                <div class="col">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" value="{{$pedido_status->descricao}}" id="status" disabled/>
                </div>
                <div class="col">
                    <label for="ativo" class="form-label">Ativo</label>
                    <input type="text" class="form-control" value="@if ($pedido->ativo === 1) sim @else não @endif" id="ativo" disabled/>
                </div>
            </div>
        </form>
    </div>
@endsection()