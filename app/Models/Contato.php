<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = "contatos";

    protected $hidden = [

    ];

    protected $appends = [

    ];

    public function enderecoRelationship(){

        return $this->belongsTo(Endereco::class,"endereco_id");

    }

    public function telefoneRelationship(){

        return $this->hasMany(Telefone::class,"contato_id");

}
    public function categoriaRelationship(){

        return $this->belongsToMany(Categoria::class,"contatos_has_categorias", "contato_id","categoria_id");

}

}
