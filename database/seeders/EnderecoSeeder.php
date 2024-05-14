<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("enderecos")->insert([
            'rua' => 'Rua 01',
            'numero' => '111',
            'cidade' => 'Aracaju',
            'contato_id' =>1,
        ]);

        // DB::table("enderecos")->insert([
        //     'rua' => 'Rua 02',
        //     'numero' => '222',
        //     'cidade' => 'São Cristóvão',
        //     'contato_id' => 0,
        // ]);

        // DB::table("enderecos")->insert([
        //     'rua' => 'Rua 03',
        //     'numero' => '333',
        //     'cidade' => 'Glória',
        //     'contato_id' => 0,
        // ]);
    }
}
