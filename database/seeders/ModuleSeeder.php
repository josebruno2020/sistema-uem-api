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
            'video' => '<iframe class="module-video" src="https://www.youtube.com/embed/sXG0Ycl0smM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'is_preparatory' => false
        ]);


        Module::create([
            'name' => 'Tema 2',
            'slug' => 'tema2',
            'video' => '<iframe class="module-video" src="https://www.youtube.com/embed/sXG0Ycl0smM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'is_preparatory' => false
        ]);
    }
}
