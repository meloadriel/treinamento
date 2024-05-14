<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categorias")->insert([
            'nome' => 'Amigos',

        ]);

        DB::table("categorias")->insert([
            'nome' => 'Vizinhos',

        ]);

        DB::table("categorias")->insert([
            'nome' => 'Parentes',

        ]);
    }
}
