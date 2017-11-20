<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvalidarProjetos extends Model
{
    /* The database table used by the model.
     *
     * @var string
     */
    protected $table = 'avalidar_projetos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    //protected $primaryKey = 'user_id', 'projeto_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'projeto_id'];

}
