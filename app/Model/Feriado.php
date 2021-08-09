<?php


namespace App\Model;
use DateTime;

use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTime fer_fechafer
 * @property string fer_descripcion
 */
class Feriado extends Model
{
    protected $table = 'feriados';
    protected $primaryKey = 'fer_codigo';
    const CREATED_AT = 'fer_fechareg';
    const UPDATED_AT = null;

    protected $attributes = [
        'fer_estado' => 1
    ];

}
