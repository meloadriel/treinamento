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

/**
 *Get the phone type. (Pegue o tipo de telefone.)
 *
 * @return Tipo
*/

    public function tipoRelationship(){
        return $this->belongsTo(Tipo::class,"tipo_id");
    }
}
