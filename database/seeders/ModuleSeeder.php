<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Module;
use App\Models\Question;
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

        $module2 = Module::create([
            'name' => 'Ventilação Mecânica',
            'slug' => 'ventilacao-mecanica',
            'video' => '<iframe class="module-video" src="https://www.youtube.com/embed/sXG0Ycl0smM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'is_preparatory' => false
        ]);
        $this->createQuestionModule($module2->id, 1, false, 'Primeira questão de teste', 1, 'Resposta 1');
        $this->createQuestionModule($module2->id, 2, true, 'Segunda questão de teste', 1, 'Resposta 2');


        Module::create([
            'name' => 'Tema 2',
            'slug' => 'tema2',
            'video' => '<iframe class="module-video" src="https://www.youtube.com/embed/sXG0Ycl0smM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'is_preparatory' => false
        ]);
    }

    protected function createQuestionModule(int $moduleId, int $number, bool $correct, string $question, int $numberAnswer, string $answer)
    {
        $question = Question::create([
            'module_id' => $moduleId,
            'number' => $number,
            'correct' => $correct,
            'question' => $question
        ]);

        $this->createAnswerQuestion($question->id, $numberAnswer, $answer);
    }

    protected function createAnswerQuestion(int $questionId, int $number, string $answer)
    {
        Answer::create([
            'question_id' => $questionId,
            'number' => $number,
            'answer' => $answer
        ]);
    }
}
