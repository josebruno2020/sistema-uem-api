<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\ClassModel;
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
        $this->createModulePreparatory();

        $module2 = Module::create([
            'name' => 'Ventilação Mecânica',
            'slug' => 'ventilacao-mecanica',
            'is_preparatory' => false
        ]);
        $this->createClassModel(
            $module2, 
            'Aula 01', 
            '<iframe class="module_video" src="https://www.youtube.com/embed/HCGj_-sUZXw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );

        $this->createClassModel(
            $module2,
            'Aula 02',
            '<iframe class="module_video" src="https://www.youtube.com/embed/HCGj_-sUZXw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );

        $module2Question1 = $this->createQuestionModule(
            $module2->id, 
            1, 
            2, 
            'Primeira questão de teste'
        );
        $this->createAnswerQuestion(
            $module2Question1->id,
            1,
            'Opção 1'
        );
        $this->createAnswerQuestion(
            $module2Question1->id,
            2,
            'Opção 2'
        );
        


        $module3 = Module::create([
            'name' => 'Tema 2',
            'slug' => 'tema2',
            'is_preparatory' => false
        ]);

        $this->createClassModel(
            $module3, 
            'Aula 01 - Tema 2', 
            '<iframe class="module_video" src="https://www.youtube.com/embed/HCGj_-sUZXw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );

        $this->createClassModel(
            $module3,
            'Aula 02 - Tema 2',
            '<iframe class="module_video" src="https://www.youtube.com/embed/HCGj_-sUZXw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );

        $this->createQuestionModule(
            $module3->id, 
            1, 
            2, 
            'Primeira questão de teste', 
            1, 
            'Resposta 1'
        );
        $this->createQuestionModule(
            $module3->id, 
            2, 
            1, 
            'Segunda questão de teste', 
            1, 
            'Resposta 2'
        );
    }

    protected function createQuestionModule(int $moduleId, int $number, bool $correct, string $question) : Question
    {
        $question = Question::create([
            'module_id' => $moduleId,
            'number' => $number,
            'correct' => $correct,
            'question' => $question
        ]);

        return $question;

        // $this->createAnswerQuestion($question->id, $numberAnswer, $answer);
    }

    protected function createAnswerQuestion(int $questionId, int $number, string $answer)
    {
        Answer::create([
            'question_id' => $questionId,
            'number' => $number,
            'answer' => $answer
        ]);
    }

    protected function createClassModel(Module $module, string $name, string $video)
    {
        ClassModel::create([
            'module_id' => $module->id,
            'name' => $name,
            'video' => $video,
        ]);
    }


    protected function createModulePreparatory()
    {
        $preparatory = Module::create([
            'name' => 'Modulo Preparatório',
            'slug' => null,
            'is_preparatory' => true
        ]);

        $preparatory1 = $this->createQuestionModule(
            $preparatory->id,
            1,
            1,
            'Pergunta 1: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus magnam reprehenderit voluptas nam delectus dolores accusamus itaque dolor distinctio, cumque vitae laborum aliquid, esse error ab exercitationem voluptate laudantium qui.'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            1,
            'Opção 1'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            2,
            'Opção 2'
        );


        $preparatory2 = $this->createQuestionModule(
            $preparatory->id,
            2,
            2,
            'Pergunta 2: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus magnam reprehenderit voluptas nam delectus dolores accusamus itaque dolor distinctio, cumque vitae laborum aliquid, esse error ab exercitationem voluptate laudantium qui.',
        );

        $this->createAnswerQuestion(
            $preparatory2->id,
            1,
            'Opção 1'
        );

        $this->createAnswerQuestion(
            $preparatory2->id,
            2,
            'Opção 2'
        );
    }
}
