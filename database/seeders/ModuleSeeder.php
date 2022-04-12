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
        //TODO video aula
        $this->createClassModel(
            $module2,
            'Aula',
            '<iframe class="module_video" src="https://www.youtube.com/embed/HCGj_-sUZXw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );

        $this->createQuestionsModule2($module2);
    }

    protected function createQuestionModule(int $moduleId, int $number, int $correct, string $question) : Question
    {
        return Question::create([
            'module_id' => $moduleId,
            'number' => $number,
            'correct' => $correct,
            'question' => $question
        ]);
    }

    protected function createAnswerQuestion(int $questionId, int $number, string $answer): void
    {
        Answer::create([
            'question_id' => $questionId,
            'number' => $number,
            'answer' => $answer
        ]);
    }

    protected function createClassModel(Module $module, string $name, string $video): void
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
            4,
            'Quais são os objetivos da ventilação mecânica?'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            1,
            'Falência mecânica do aparelho respiratório.'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            2,
            'Prevenção de complicações respiratórias.'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            3,
            'Manutenção da troca gasosa.'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            4,
            'Alternativa C e E estão corretas.'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            5,
            'Permitir a aplicação de terapêuticas específicas.'
        );


        $preparatory2 = $this->createQuestionModule(
            $preparatory->id,
            2,
            1,
            'A ventilação mecânica propicia melhora das trocas gasosas e diminuição do trabalho respiratório, podendo ser utilizada de forma invasiva através de um tubo endotraqueal ou cânula de traqueostomia.',
        );

        $this->createAnswerQuestion(
            $preparatory2->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $preparatory2->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $preparatory2->id,
            3,
            'Parcialmente'
        );


        $preparatory3 = $this->createQuestionModule(
            $preparatory->id,
            3,
            3,
            'Parâmetros de ajustes iniciais de ventilação mecânica: modalidade PCV-VCV volume corrente de 6-10ml/kg/peso, Frequência respiratória entre 16-18rpm.',
        );

        $this->createAnswerQuestion(
            $preparatory3->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $preparatory3->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $preparatory3->id,
            3,
            'Parcialmente'
        );

        $preparatory4 = $this->createQuestionModule(
            $preparatory->id,
            4,
            1,
            'O volume corrente, quantidade de gás que está sendo expirada e, por conseguinte, insuflada ao paciente e que a administração excessiva deste pode resultar em volutrauma, inicialmente deve ser de 6ml/kg/peso?',
        );

        $this->createAnswerQuestion(
            $preparatory4->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $preparatory4->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $preparatory4->id,
            3,
            'Parcialmente'
        );


        $preparatory5 = $this->createQuestionModule(
            $preparatory->id,
            5,
            2,
            'PEEP Pressão Positiva Expiratória devem ser utilizados de 5-10cmH2o e ajustados de acordo a avaliação beira leito do paciente (olhar clinico)?',
        );

        $this->createAnswerQuestion(
            $preparatory5->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $preparatory5->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $preparatory5->id,
            3,
            'Parcialmente'
        );


        $preparatory6 = $this->createQuestionModule(
            $preparatory->id,
            6,
            1,
            'Na Ventilação não invasiva, utiliza-se uma interfase externa geralmente uma máscara facial?',
        );

        $this->createAnswerQuestion(
            $preparatory6->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $preparatory6->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $preparatory6->id,
            3,
            'Parcialmente'
        );

        $preparatory7 = $this->createQuestionModule(
            $preparatory->id,
            7,
            4,
            'Quais são as indicações para o uso da ventilação mecânica?',
        );

        $this->createAnswerQuestion(
            $preparatory7->id,
            1,
            'Hipoventilação e Apneia (aguda ou crônica).'
        );

        $this->createAnswerQuestion(
            $preparatory7->id,
            2,
            'IRpA - doença pulmonar intrínseca e hipoxemia (alteração de ventilação/perfusão - distúrbio V/Q).'
        );

        $this->createAnswerQuestion(
            $preparatory7->id,
            3,
            'Reverter ou evitar a fadiga da musculatura respiratória.'
        );

        $this->createAnswerQuestion(
            $preparatory7->id,
            4,
            'As alternativas “a” e “b”estão corretas'
        );
    }

    protected function createQuestionsModule2($module2)
    {
        $question1 = $this->createQuestionModule(
            $module2->id,
            1,
            1,
            'Entre os objetivos da ventilação mecânica, alterar as relações pressão-volume:'
        );

        $this->createAnswerQuestion(
            $question1->id,
            1,
            'Melhora a complacência pulmonar.'
        );
        $this->createAnswerQuestion(
            $question1->id,
            2,
            'Reverte a hipoxemia.'
        );

        $this->createAnswerQuestion(
            $question1->id,
            3,
            'Atenua a acidose respiratória aguda.'
        );

        $this->createAnswerQuestion(
            $question1->id,
            4,
            'Reverte a fadiga muscular respiratória.'
        );

        $question2 = $this->createQuestionModule(
            $module2->id,
            2,
            1,
            'Um dos critérios para indicação de ventilação mecânica: parada cardiorrespiratória, SARA, rebaixamento de nível de consciência.'
        );

        $this->createAnswerQuestion(
            $question2->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $question2->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question2->id,
            3,
            'Parcialmente'
        );

        $question3 = $this->createQuestionModule(
            $module2->id,
            3,
            2,
            'PSV modo de disparo exclusivo do paciente, ventilação assisto-controlada: permite o controle mais adequado das pressões em vvaas e alveolares e ventilação controlado volume  VCV: ventilação depende da mecânica ventilatória do paciente?'
        );

        $this->createAnswerQuestion(
            $question3->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $question3->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question3->id,
            3,
            'Parcialmente'
        );


        $question4 = $this->createQuestionModule(
            $module2->id,
            4,
            1,
            'Sinais clínicos/mecânicos da assincronia do paciente e ventilador mecânico sendo percebe-se esforço inspiratório do paciente, sudorese excessiva, observando o acompanhamento do ciclo fornecido pelo ventilador.'
        );

        $this->createAnswerQuestion(
            $question4->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $question4->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question4->id,
            3,
            'Parcialmente'
        );

        $question5 = $this->createQuestionModule(
            $module2->id,
            5,
            1,
            'Com relação à VMI, julgue o item. No modo ventilatório em pressão de suporte, o paciente determina a frequência respiratória, o tempo inspiratório e o volume:'
        );

        $this->createAnswerQuestion(
            $question5->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $question5->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question5->id,
            3,
            'Parcialmente'
        );


        $question6 = $this->createQuestionModule(
            $module2->id,
            6,
            2,
            'O balonete da prótese traqueal deve se manter entre 30-35cmH2o com o cuffometro?'
        );

        $this->createAnswerQuestion(
            $question6->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $question6->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question6->id,
            3,
            'Parcialmente'
        );


        $question7 = $this->createQuestionModule(
            $module2->id,
            7,
            1,
            'Pneumonia associada a ventilação mecânica PAV: deve se manter uma PaCo2 entre 35-45 mmHg. Para isso deve se alterar a Frequência respiratória no ventilador?'
        );

        $this->createAnswerQuestion(
            $question7->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $question7->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question7->id,
            3,
            'Parcialmente'
        );

        $question8 = $this->createQuestionModule(
            $module2->id,
            8,
            1,
            'Para o desmame da ventilação mecânica deve ser realizado o teste de respiração espontânea TRE?'
        );

        $this->createAnswerQuestion(
            $question8->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $question8->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question8->id,
            3,
            'Parcialmente'
        );
    }
}
