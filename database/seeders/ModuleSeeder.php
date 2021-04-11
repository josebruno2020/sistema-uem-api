<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name' => 'Modulo Preparatório',
            'slug' => 'preparatory',
            'video' => 'video de teste',
            'is_preparatory' => true
        ]);

        Module::create([
            'name' => 'Tema 1',
            'slug' => 'tema1',
            'video' => 'video de teste',
            'is_preparatory' => false
        ]);
    }
}
