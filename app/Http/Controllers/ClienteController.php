<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    private $objCliente;

    public function __construct()
    {
        $this->objCliente = new Cliente();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->objCliente->all();
        return view('cliente/index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cad = $this->objCliente->create([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'data_nasc'=>$request->data_nasc,
            'telefone'=>$request->telefone,
            'ativo'=>1,
        ]);

        if($cad){
            return redirect('clientes');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = $this->objCliente->find($id);
        return view('cliente/edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $this->objCliente->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'data_nasc'=>$request->data_nasc,
            'telefone'=>$request->telefone,
            'ativo'=>$request->ativo,
        ]);

        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objCliente->destroy($id);
        return($del)? 'clientes' : "não";
    }
}
