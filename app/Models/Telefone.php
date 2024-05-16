<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
/**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = "telefones";
 /**
 * The attributer that shoudl be hidden for arrays.
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

public function getTipoAttribute() {
    return $this->getTipoAttribute();
}

public function setTelefoneAttribute($value) {
    if (isset($value)) {
        $this->attributes["contato_id"] = Contato::where("id", $value)->first()->id;
    }
}
public function setTipoAttribute($value) {

    if(isset($value)) {
        $this->attributes["tipo_id"] = Contato::where("id", $value)->first()->id;

}
}
/**
 *Get the phone type. (Pegue o tipo de telefone.)
 *
 * @return Tipo
*/

    public function tipoRelationship(){
        return $this->belongsTo(Tipo::class,"tipo_id");
    }
}
