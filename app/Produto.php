<?php

namespace CursoLaravel;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //protected $table = 'produtos';
    
    public $timestamps = false;
    
    public $fillable = ['nome', 'valor', 'quantidade', 'descricao']; //Importante para ::mass assignment::

}
