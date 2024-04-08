<?php

namespace App\Http\Controllers;

use App\Models\PedidoImagem;
use App\Http\Requests\ImageRequest;
use Intervention\Image\ImageManager;


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
        $image_name = 'pedido'.'-'.$pedido_id.'.'.$request->image->extension();
        $image_thumb_name = 'pedido'.'-'.$pedido_id.'-thumb'.'.'.$request->image->extension();

        $request->image->move(public_path('assets/images/full'), $image_name);
        $manager = new ImageManager();
        $image_thumb = $manager->make('assets/images/full/'.$image_name)->resize(90, 100);
        $image_thumb->save(public_path('assets\images\thumbnail\\'.$image_thumb_name));

        $cad = $this->objImagem->create([
            'pedido_id'=>$request->pedido_id,
            'imagen'=>$image_name,
            'capa'=>$image_thumb_name,
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
