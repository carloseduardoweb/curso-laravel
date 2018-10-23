<?php

namespace CursoLaravel;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
    
    public function produtos() {
        return $this->hasMany('CursoLaravel\Produto');
    }
}
