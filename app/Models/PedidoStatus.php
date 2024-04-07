<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoStatus extends Model
{
    protected $table='pedido_status';
    use HasFactory;
    

    public function relPedidos()
    {
        return $this->hasOne('App\Models\Pedido', 'pedidos_status_id', 'id');
    }
}
