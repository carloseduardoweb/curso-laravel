<?php

use Illuminate\Database\Seeder;
use CursoLaravel\Categoria;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call(CategoriaTableSeeder::class);
    }
}

class CategoriaTableSeeder extends Seeder {

    public function run() {
        Categoria::create(['nome' => 'Eletrônicos']);
        Categoria::create(['nome' => 'Eletrodomésticos']);
        Categoria::create(['nome' => 'Brinquedos']);
    }
}