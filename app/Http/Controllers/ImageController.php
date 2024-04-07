<?php

namespace App\Http\Controllers;


use App\Models\PedidoImagem;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    private $objImagem;

    public function __construct()
    {
        $this->objImagem = new PedidoImagem();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pedido_id)
    {
        return view('image/create',compact('pedido_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {

        $pedido_id = $request->pedido_id;
        $imageName = $pedido_id.'-'.time().'.'.$request->image->extension();

        $request->image->move(public_path('assets/images/full'), $imageName);
        //$request->image->move(public_path('assets/image/thumbnail'), $imageName);

        $cad = $this->objImagem->create([
            'pedido_id'=>$request->pedido_id,
            'imagen'=>$imageName,
            //'capa'=>$request->data,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
