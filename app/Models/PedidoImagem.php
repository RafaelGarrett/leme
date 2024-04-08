<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoImagem extends Model
{
    protected $table='pedidos_imagens';
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pedido_id',
        'imagen',
        'capa',
    ];

    public function relPedido()
    {
        return $this->hasOne('App\Models\Pedido', 'id', 'pedido_id');
    }

}
