<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\ClassModel;
use App\Models\Module;
use App\Models\Question;
use App\Models\Quiz;
use App\Services\AnswerService;
use App\Services\ClassService;
use App\Services\QuestionService;
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
        $module = Module::create([
            'name' => 'Ventilação Mecânica',
            'slug' => 'ventilacao-mecanica',
            'description' => 'Ventilação mecânica básica para profissionais da saúde',
            'cover' => 'cover-1.jpeg'
        ]);

        //TODO video aula
        ClassService::createClassModel(
            $module,
            'Ventilação Mecânica',
            '<iframe class="module_video" src="https://www.youtube.com/embed/HCGj_-sUZXw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );

        $this->createPreparatoryQuiz($module);



        $this->createFinalQuiz($module);
    }


    private function createPreparatoryQuiz(Module $module): void
    {
        $quiz = Quiz::create([
            'title' => 'Questionário Preparatório',
            'module_id' => $module->id,
            'is_preparatory' => true
        ]);

        $preparatory1 = QuestionService::createQuestion(
            $quiz->id,
            1,
            4,
            'Quais são os objetivos da ventilação mecânica?'
        );

        AnswerService::createAnswerQuestion(
            $preparatory1->id,
            1,
            'Falência mecânica do aparelho respiratório.'
        );

        AnswerService::createAnswerQuestion(
            $preparatory1->id,
            2,
            'Prevenção de complicações respiratórias.'
        );


        AnswerService::createAnswerQuestion(
            $preparatory1->id,
            3,
            'Manutenção da troca gasosa.'
        );

        AnswerService::createAnswerQuestion(
            $preparatory1->id,
            4,
            'Alternativas C e E estão corretas.'
        );

        AnswerService::createAnswerQuestion(
            $preparatory1->id,
            5,
            'Permitir a aplicação de terapêuticas específicas.'
        );

        $preparatory2 = QuestionService::createQuestion(
            $quiz->id,
            2,
            1,
            'A ventilação mecânica propicia melhora das trocas gasosas e diminuição do trabalho respiratório, podendo ser utilizada de forma invasiva através de um tubo endotraqueal ou cânula de traqueostomia.',
        );

        AnswerService::createAnswerQuestion(
            $preparatory2->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $preparatory2->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $preparatory2->id,
            3,
            'Parcialmente'
        );


        $preparatory3 = QuestionService::createQuestion(
            $quiz->id,
            3,
            3,
            'Parâmetros de ajustes iniciais de ventilação mecânica: modalidade PCV-VCV volume corrente de 6-10ml/kg/peso, Frequência respiratória entre 16-18rpm.',
        );

        AnswerService::createAnswerQuestion(
            $preparatory3->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $preparatory3->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $preparatory3->id,
            3,
            'Parcialmente'
        );

        $preparatory4 = QuestionService::createQuestion(
            $quiz->id,
            4,
            1,
            'O volume corrente, quantidade de gás que está sendo expirada e, por conseguinte, insuflada ao paciente e que a administração excessiva deste pode resultar em volutrauma, inicialmente deve ser de 6ml/kg/peso?',
        );

        AnswerService::createAnswerQuestion(
            $preparatory4->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $preparatory4->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $preparatory4->id,
            3,
            'Parcialmente'
        );


        $preparatory5 = QuestionService::createQuestion(
            $quiz->id,
            5,
            2,
            'PEEP Pressão Positiva Expiratória devem ser utilizados de 5-10cmH2o e ajustados de acordo a avaliação beira leito do paciente (olhar clinico)?',
        );

        AnswerService::createAnswerQuestion(
            $preparatory5->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $preparatory5->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $preparatory5->id,
            3,
            'Parcialmente'
        );
    }

    protected function createFinalQuiz(Module $module): void
    {
        $quiz = Quiz::create([
            'title' => 'Questionário Final',
            'module_id' => $module->id,
            'is_preparatory' => false
        ]);

        $question1 = QuestionService::createQuestion(
            $quiz->id,
            1,
            1,
            'Entre os objetivos da ventilação mecânica, alterar as relações pressão-volume:'
        );

        AnswerService::createAnswerQuestion(
            $question1->id,
            1,
            'Melhora a complacência pulmonar.'
        );
        AnswerService::createAnswerQuestion(
            $question1->id,
            2,
            'Reverte a hipoxemia.'
        );

        AnswerService::createAnswerQuestion(
            $question1->id,
            3,
            'Atenua a acidose respiratória aguda.'
        );

        AnswerService::createAnswerQuestion(
            $question1->id,
            4,
            'Reverte a fadiga muscular respiratória.'
        );

        $question2 = QuestionService::createQuestion(
            $quiz->id,
            2,
            1,
            'Um dos critérios para indicação de ventilação mecânica: parada cardiorrespiratória, SARA, rebaixamento de nível de consciência.'
        );

        AnswerService::createAnswerQuestion(
            $question2->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $question2->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $question2->id,
            3,
            'Parcialmente'
        );

        $question3 = QuestionService::createQuestion(
            $quiz->id,
            3,
            2,
            'PSV modo de disparo exclusivo do paciente, ventilação assisto-controlada: permite o controle mais adequado das pressões em vvaas e alveolares e ventilação controlado volume  VCV: ventilação depende da mecânica ventilatória do paciente?'
        );

        AnswerService::createAnswerQuestion(
            $question3->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $question3->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $question3->id,
            3,
            'Parcialmente'
        );

        $question4 = QuestionService::createQuestion(
            $quiz->id,
            4,
            1,
            'Sinais clínicos/mecânicos da assincronia do paciente e ventilador mecânico sendo percebe-se esforço inspiratório do paciente, sudorese excessiva, observando o acompanhamento do ciclo fornecido pelo ventilador.'
        );

        AnswerService::createAnswerQuestion(
            $question4->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $question4->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $question4->id,
            3,
            'Parcialmente'
        );


        $question5 = QuestionService::createQuestion(
            $quiz->id,
            5,
            1,
            'Com relação à VMI, julgue o item. No modo ventilatório em pressão de suporte, o paciente determina a frequência respiratória, o tempo inspiratório e o volume:'
        );

        AnswerService::createAnswerQuestion(
            $question5->id,
            1,
            'Certo'
        );

        AnswerService::createAnswerQuestion(
            $question5->id,
            2,
            'Errado'
        );

        AnswerService::createAnswerQuestion(
            $question5->id,
            3,
            'Parcialmente'
        );
    }
}
