<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projetos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Titulo', 'descricao', 'Arquivo', 'id_user'];

    
}
