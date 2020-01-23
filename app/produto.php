<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
class produto extends Model
{
    
    
    protected $fillable =[
        "nome",
        "valor",
        "descricao",
        "qtd",
        "user_id"
    ];
    //protected $dates = ['deleted_at'];
}
