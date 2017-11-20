<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PontuarProjeto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pontuar_projetos';

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
    protected $fillable = ['ponto', 'resposta_publica', 'resposta_confidencial', 'projeto_id'];

    
}
