<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tipos")->insert([
            'nome' => 'Fixo',

        ]);

        DB::table("tipos")->insert([
            'nome' => 'Celular',

        ]);

    }
}
