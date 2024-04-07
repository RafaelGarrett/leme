<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='pedidos';
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'produto',
        'valor',
        'data',
        'cliente_id',
        'pedidos_status_id',
        'ativo',
    ];

    public function relCliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }

    public function relStatus()
    {
        return $this->hasOne('App\Models\PedidoStatus', 'id', 'pedidos_status_id');
    }

}
