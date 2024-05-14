<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = "telefones";

    protected $hidden = [

    ];

    protected $appends = [

    ];
    public function tipoRelationship(){
        return $this->belongsTo(Tipo::class,"tipo_id");
    }
}
