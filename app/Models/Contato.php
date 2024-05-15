<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
/**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = "contatos";
 /**
 * The attributer that should be hidden for arrays.
 *
 * @var array
 */
    protected $hidden = [

    ];
/**
 * The accessors to append to the model's array form.
 *
 * @var array
 */
    protected $appends = [

    ];

/**
 *Get the Endereco that owns the contato. (Pegue o endereço que pertence ao contato.)
 *
 * @return Endereco
*/

    public function enderecoRelationship(){

        return $this->belongsTo(Endereco::class,"endereco_id");

    }

/**
 *Get the Telefones that belong to the contato. (pegue os telefones que pertencem ao contato.)
 *
 * @return Telefone
*/
    public function telefoneRelationship(){

        return $this->hasMany(Telefone::class,"contato_id");

}

/**
 * The Categorias that belong to the contato. (categorias que pertencem ao contato.)
 *
 * @return Categoria
*/
    public function categoriaRelationship(){

        return $this->belongsToMany(Categoria::class,"contatos_has_categorias", "contato_id","categoria_id");

}

}
