<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\PedidoStatus;
use App\Http\Requests\PedidoRequest;
use Illuminate\Support\Facades\Response;

class PedidoController extends Controller
{
    private $objCliente;
    private $objPedido;
    private $objStatus;

    public function __construct()
    {
        $this->objPedido = new Pedido();
        $this->objCliente = new Cliente();
        $this->objStatus = new PedidoStatus();;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = $this->objPedido->all();
        return view('pedido/index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = $this->objCliente->all();
        return view('pedido/create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        $cad = $this->objPedido->create([
            'produto'=>$request->produto,
            'valor'=>$request->valor,
            'data'=>$request->data,
            'cliente_id'=>$request->cliente_id,
            'pedidos_status_id'=>1,
            'ativo'=>1,
        ]);

        if($cad){
            return redirect('pedidos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = $this->objPedido->find($id);
        return view('pedido/show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = $this->objPedido->find($id);
        $clientes = $this->objCliente->all();
        $statuses = $this->objStatus->all();
        return view('pedido/edit', compact('pedido','clientes','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PedidoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoRequest $request, $id)
    {
        $this->objPedido->where(['id'=>$id])->update([
            'produto'=>$request->produto,
            'valor'=>$request->valor,
            'data'=>$request->data,
            'cliente_id'=>$request->cliente_id,
            'pedidos_status_id'=>$request->pedidos_status_id,
            'ativo'=>$request->ativo,
        ]);

        return redirect('pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objPedido->destroy($id);
        return($del)? 'pedidos' : "não";
    }

    public function export()
    {
        $pedidos = $this->objPedido->all();
        $csvFileName = 'pedidos.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['id','produto','valor','data','cliente_id','pedidos_status_id','ativo','created_at','updated_at']);

        foreach ($pedidos as $pedido) {
            fputcsv($handle, [$pedido->id, $pedido->produto,$pedido->valor,$pedido->data,$pedido->cliente_id,$pedido->pedidos_status_id,$pedido->ativo,$pedido->created_at,$pedido->updated_at,]);
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }
}
