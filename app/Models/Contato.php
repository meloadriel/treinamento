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
     * The attributes that should be hidden for arrays.
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

    // Getters

    public function getEnderecoAttribute() {
        return $this->enderecoRelationship();
    }

    public function getTelefoneAttribute() {
        return $this->telefoneRelationship();
    }

    public function getCategoriaAttribute() {
        return $this->categoriaRelationship();
    }

    // Setters

    public function setEnderecoAttribute($value) {
        if (isset($value)) {
            $this->attributes["endereco_id"] = Endereco::where("id", $value)->first()->id;
        }
    }

    public function setCategoriaAttribute($value) {
        $this->categoriaRelationship()->sync($value);
    }

    // Relationship Methods

    /**
     * Get the Endereco that owns the contato. (Pegue o endereço que pertence ao contato.)
     *
     * @return Endereco
     */
    public function enderecoRelationship() {
        return $this->belongsTo(Endereco::class, "endereco_id");
    }

    /**
     * Get the Telefones that belong to the contato. (Pegue os telefones que pertencem ao contato.)
     *
     * @return Telefone
     */
    public function telefoneRelationship() {
        return $this->hasMany(Telefone::class, "contato_id");
    }

    /**
     * The Categorias that belong to the contato. (Categorias que pertencem ao contato.)
     *
     * @return Categoria
     */
    public function categoriaRelationship() {
        return $this->belongsToMany(Categoria::class, "contatos_has_categorias", "contato_id", "categoria_id");
    }
}
