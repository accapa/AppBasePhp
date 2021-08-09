<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string usu_codigo
 */
class User extends Model
{
    protected $table = 'tsegusuario';
    protected $primaryKey = 'usu_codigo';
    const CREATED_AT = 'usu_fecharegistra';
    const UPDATED_AT = 'usu_fechaactualiza';
}
