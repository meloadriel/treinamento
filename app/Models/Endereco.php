<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

public function getEnderecoAttribute(){
    return $this->enderecoRelationship;
}

/**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = "enderecos";

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

}
