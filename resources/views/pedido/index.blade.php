@extends('templates.template')

@section('content')
    <h1 class="text-center">Pedidos</h1>
    <hr/>
    <div class="col-8 m-auto">
        <div class="text-end">
            <a href="{{url("pedidos/export")}}">
                <button class="btn btn-success">Export CSV</button>
            </a>
        </div>
        <br/>
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    @php
                        $cliente = $pedido->find($pedido->id)->relCliente;
                        $pedido_status = $pedido->find($pedido->id)->relStatus;
                        $valor = number_format($pedido->valor, 2);
                        $images = $pedido->find($pedido->id)->relImages;
                    @endphp
                    <tr>
                        <th scope="row">{{$pedido->id}}</th>
                        <td>{{$pedido->produto}}</td>
                        <td>R${{$valor}}</td>
                        <td>{{\Carbon\Carbon::parse($pedido->data)->format('d/m/Y')}}</td>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$pedido_status->descricao}}</td>
                        <td>@if ($pedido->ativo === 1) sim @else não @endif</td>
                        <td>
                            @if (count($images) > 0)
                                <img src="{{url('assets/images/thumbnail/'.$images[0]->capa)}}" height="90px">
                            @endif
                        </td>
                        <td>
                            <a href="{{url("pedidos/$pedido->id")}}">
                                <button class="btn btn-dark">Visualizar</button>
                            </a>
                            <a href="{{url("pedidos/$pedido->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="{{url("pedidos/$pedido->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                            <a href="{{url("images/create/$pedido->id")}}">
                                <button class="btn btn-success">Upload</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection()