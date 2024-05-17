<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
/**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = "tipos";
/**
 * The attributer that shoudl be hidden for arrays.
 *
 * @var array
 */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
/**
 * The accessors to append to the model's array form.
 *
 * @var array
 */
    protected $appends = [

    ];

}
