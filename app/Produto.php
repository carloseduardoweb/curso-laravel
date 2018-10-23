<?php

namespace CursoLaravel;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

    //protected $table = 'produtos';
    
    public $timestamps = false;
    
    protected $fillable = ['nome', 'valor', 'quantidade', 'descricao', 'tamanho', 'categoria_id']; //Importante para ::mass assignment::
    //protected $guarded = ['id']; //Importante para ::mass assignment::

    public function isEmpty() {
        return empty($this->attributesToArray());
    }

    public function categoria() {
        return $this->belongsTo('CursoLaravel\Categoria');
    }

}
