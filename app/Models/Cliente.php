<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cpf',
        'data_nasc',
        'telefone',
        'ativo',
    ];

    public function relPedidos()
    {
        return $this->hasMany('App\Models\Pedido', 'cliente_id', 'id');
    }

}
