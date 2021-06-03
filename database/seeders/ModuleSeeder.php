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

        $this->createQuestionsModule2($module2);

        


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

        $this->createQuestionsModule3($module3);
    }

    protected function createQuestionModule(int $moduleId, int $number, int $correct, string $question) : Question
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
            'A ventilação mecânica propicia melhora das trocas gasosas e diminuição do trabalho respiratório, podendo ser utilizada de forma invasiva através de um tubo endotraqueal ou cânula de traqueostomia.'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            1,
            'Certo'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $preparatory1->id,
            3,
            'Parcialmente'
        );


        $preparatory2 = $this->createQuestionModule(
            $preparatory->id,
            2,
            3,
            'Parâmetros de ajustes iniciais de ventilação mecânica: modalidade PCV-VCV volume corrente de 6-10ml/kg/peso, Frequência respiratória entre 16-18rpm.',
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
            1,
            'O volume corrente, quantidade de gás que está sendo expirada e, por conseguinte, insuflada ao paciente e que a administração excessiva deste pode resultar em volutrauma, inicialmente deve ser de 6ml/kg/peso?',
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
            2,
            'PEEP Pressão Positiva Expiratória devem ser utilizados de 5-10cmH2o e ajustados de acordo a avaliação beira leito do paciente (olhar clinico)?',
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
            1,
            'Na Ventilação não invasiva, utiliza-se uma interfase externa geralmente uma máscara facial?',
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
    }

    protected function createQuestionsModule2($module2)
    {
        $question1 = $this->createQuestionModule(
            $module2->id, 
            1, 
            1, 
            'Um dos critérios para indicação de ventilação mecânica: parada cardiorrespiratória, SARA, rebaixamento de nível de consciência.'
        );

        $this->createAnswerQuestion(
            $question1->id,
            1,
            'Certo'
        );
        $this->createAnswerQuestion(
            $question1->id,
            2,
            'Errado'
        );

        $this->createAnswerQuestion(
            $question1->id,
            3,
            'Parcialmente'
        );

        $question2 = $this->createQuestionModule(
            $module2->id, 
            2, 
            2, 
            'PSV modo de disparo exclusivo do paciente, ventilação assisto-controlada: permite o controle mais adequado das pressões em vvaas e alveolares e ventilação controlado volume  VCV: ventilação depende da mecânica ventilatória do paciente?'
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
            1, 
            'Sinais clínicos/mecânicos da assincronia do paciente e ventilador mecânico sendo percebe-se esforço inspiratório do paciente, sudorese excessiva, observando o acompanhamento do ciclo fornecido pelo ventilador.'
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
            2, 
            'O balonete da prótese traqueal deve se manter entre 30-35cmH2o com o cuffometro?'
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
            'Pneumonia associada a ventilação mecânica PAV: deve se manter uma PaCo2 entre 35-45 mmHg. Para isso deve se alterar a Frequência respiratória no ventilador?'
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

       
        
    }

    protected function createQuestionsModule3($module3) 
    {
        $question1 = $this->createQuestionModule(
            $module3->id, 
            1, 
            2, 
            'Em relação a pré-oxigenação, marque a afirmação incorreta.'
        );

        $this->createAnswerQuestion(
            $question1->id,
            1,
            'A pre-oxigenação pode ser realizada mediante uso de VNI (ventilação não invasiva), antes da intubação orotraqueal'
        );
        $this->createAnswerQuestion(
            $question1->id,
            2,
            'O objetivo de realizar a pré-oxigenação, é definir se realmente o paciente necessita da intubação orotraqueal, só depois da pré-oxigenação definirá se será feito ou não o procedimento'
        );

        $this->createAnswerQuestion(
            $question1->id,
            3,
            'O uso de máscara não reinalante associado ao cateter nasal pode ser utilizado como pré-oxigenação'
        );

        $this->createAnswerQuestion(
            $question1->id,
            4,
            'A pré-oxigenação tem objetivo de aumentar o aporte de oxigênio, para que o paciente, antes do procedimento de intubação orotraqueal, possa suportar o período de apneia durante o procedimento de via aérea definitiva'
        );


        $question2 = $this->createQuestionModule(
            $module3->id, 
            2, 
            3, 
            'Na laringoscopia, qual estrutura deve ter a melhor visualização durante a passagem do tubo orotraqueal, para ter certeza de da intubação orotraqueal correta.'
        );


        $this->createAnswerQuestion(
            $question2->id,
            1,
            'Valécula'
        );
        $this->createAnswerQuestion(
            $question2->id,
            2,
            'Epiglote'
        );

        $this->createAnswerQuestion(
            $question2->id,
            3,
            'Cordas Vocais'
        );

        $this->createAnswerQuestion(
            $question2->id,
            4,
            'Base da língua'
        );

        $question3 = $this->createQuestionModule(
            $module3->id, 
            3, 
            4, 
            'Nem todas as intubações há visualização da introdução do tubo na traqueia. Existem indicativos que, se somados, dão segurança para a confirmação da intubação orotraqueal, exceto:'
        );

        $this->createAnswerQuestion(
            $question3->id,
            1,
            'Capnografia com presença de CO2 formando curva em forma de onda'
        );
        $this->createAnswerQuestion(
            $question3->id,
            2,
            'Ausculta pulmonar bilateral'
        );

        $this->createAnswerQuestion(
            $question3->id,
            3,
            'Visualização ultrassonográfica de tubo orotraqueal em traqueia'
        );

        $this->createAnswerQuestion(
            $question3->id,
            4,
            'Presença de vapor em tubo orotraqueal e ausculta de região epigástrica com som rude presente'
        );

        $question4 = $this->createQuestionModule(
            $module3->id, 
            4, 
            3, 
            'Durante a ausculta pulmonar, nota-se que não tem murmúrio vesicular em hemitórax esquerdo, sendo o direito, com ausculta normal. Qual afirmativa condiz com o quadro clínico.'
        );

        $this->createAnswerQuestion(
            $question4->id,
            1,
            'intubação esofágica'
        );
        $this->createAnswerQuestion(
            $question4->id,
            2,
            'pneumotórax a direita'
        );

        $this->createAnswerQuestion(
            $question4->id,
            3,
            'intubação seletiva'
        );

        $this->createAnswerQuestion(
            $question4->id,
            4,
            'cuff do tubo orotraqueal furado'
        );


        $question5 = $this->createQuestionModule(
            $module3->id, 
            5, 
            1, 
            'Para o sucesso da intubação orotraqueal, são utilizadas algumas medidas e medicações para fazer a intubação orotraqueal. Relaxante muscular (1), sedativos/hipnóticos (2) analgésicos/opioide (3) e oxigenoterapia (4). Marque a melhor sequência dos eventos:'
        );

        $this->createAnswerQuestion(
            $question5->id,
            1,
            '4; 3; 2; 1.'
        );
        $this->createAnswerQuestion(
            $question5->id,
            2,
            '3; 1; 4; 2.'
        );

        $this->createAnswerQuestion(
            $question5->id,
            3,
            '1; 2; 3; 4.'
        );

        $this->createAnswerQuestion(
            $question5->id,
            4,
            '4; 3; 1; 2.'
        );


        $question6 = $this->createQuestionModule(
            $module3->id, 
            6, 
            3, 
            'A possibilidade de intubação difícil deve ser avaliada antes da realização do procedimento de intubação orotraqueal. Qual fator não pressupõe dificuldade no procedimento. '
        );

        $this->createAnswerQuestion(
            $question6->id,
            1,
            'Obesidade'
        );
        $this->createAnswerQuestion(
            $question6->id,
            2,
            'Idade > 55 anos'
        );

        $this->createAnswerQuestion(
            $question6->id,
            3,
            'Sexo feminino'
        );

        $this->createAnswerQuestion(
            $question6->id,
            4,
            'História previa de apneia do sono'
        );

        $question7 = $this->createQuestionModule(
            $module3->id, 
            7, 
            3, 
            'Via aérea definitiva em pacientes Covid são considerados com potencial fator de via aérea difícil, não apenas pelo perfil do paciente, mas também pelo uso de EPIs que dificultam o procedimento, entre eles o uso de Face Shild. É interessante ter dispositivos que auxiliam para o manejo de via aérea disponíveis no serviço. Dos itens abaixo, qual é a alternativa ERRADA em relação aos dispositivos utilizados para obtenção/auxílio de VIA AEREA DEFINITIVA. '
        );

        $this->createAnswerQuestion(
            $question7->id,
            1,
            'Bougie, Sonda de aspiração rigida, videolaringoscopio, tubo orotraqueal'
        );
        $this->createAnswerQuestion(
            $question7->id,
            2,
            'Cânula orofaríngea (Guedel), fio guia, tubo orotraqueal, material de cricotireoidostomia cirúrgica'
        );

        $this->createAnswerQuestion(
            $question7->id,
            3,
            'Sonda de aspiração, máscara laríngea, sonda nasofaríngea'
        );

        $this->createAnswerQuestion(
            $question7->id,
            4,
            'Laringoscópio com dispositivo de vídeo, Bougie, material de cricotireoidostomia por punção'
        );


        $question8 = $this->createQuestionModule(
            $module3->id, 
            8, 
            3, 
            'Sobre intubação orotraqueal em pacientes com Covid-19, é correto afirmar:'
        );


        $this->createAnswerQuestion(
            $question8->id,
            1,
            'A videolaringoscopia para intubação orotraqueal é indicada somente nos casos de intubação difícil'
        );
        $this->createAnswerQuestion(
            $question8->id,
            2,
            'A cricotireoidostomia cirúrgica deve ser indicada nos pacientes que possuem Mallampat III e IV'
        );

        $this->createAnswerQuestion(
            $question8->id,
            3,
            'A cricotireoidostomia cirúrgica deve ser preparada em todas as intubações e ser executada apenas se houver falha no procedimento de intubação (intubação difícil)'
        );

        $this->createAnswerQuestion(
            $question8->id,
            4,
            'Em caso de pacientes graves, com intubação difícil, deve ser indicada a traqueostomia de urgência'
        );


        $question9 = $this->createQuestionModule(
            $module3->id, 
            9, 
            2, 
            'A laringoscopia/intubação difícil é possível nos pacientes com Covid-19, tanto pelo perfil de paciente acometido, quanto pela necessidade de uso de EPIs (principalmente pelo uso de Face Shield). O conhecimento de fatores e preditores de intubação difícil aumentam o sucesso da intubação orotraqueal. Os itens listados são preditores de intubação difícil, exceto:'
        );

        $this->createAnswerQuestion(
            $question9->id,
            1,
            'Classificação de Mallampati graus III e IV.'
        );
        $this->createAnswerQuestion(
            $question9->id,
            2,
            'Medidas maiores que a distância 3-3-2 (polpas digitais) da: abertura oral – entre os incisivos; assoalho da boca, espaço entre assoalho da boca e laringe, respectivamente.'
        );

        $this->createAnswerQuestion(
            $question9->id,
            3,
            'Imobilidade da coluna cervical, seja por artrose ou colar cervical'
        );

        $this->createAnswerQuestion(
            $question9->id,
            4,
            'Classificação Cormack-Lehane grau IV.'
        );



        $question10 = $this->createQuestionModule(
            $module3->id, 
            10, 
            4, 
            'Para realização de intubação orotraqueal em uma unidade de atendimento com caso suspeito de Covid-19. Marque a incorreta:'
        );

        $this->createAnswerQuestion(
            $question10->id,
            1,
            'Para realização de intubação orotraqueal deve ter toda equipe paramentada com uso de avental, luvas, máscara N 95, touca, Face Shield ou óculos de proteção.'
        );
        $this->createAnswerQuestion(
            $question10->id,
            2,
            'A intubação é planejada de forma multidisciplinar (médicos, enfermeiros, técnicos de enfermagem, fisioterapeutas).'
        );

        $this->createAnswerQuestion(
            $question10->id,
            3,
            'O plano de intubação orotraqueal consiste em organizar os profissionais de saúde da unidade atendimento em ter, de forma acessível e prática, os materiais e medicações para intubação, assim como deixar ventilador preparado. Além disso, deve ter nas imediações materiais que auxilie nas intercorrências como materiais de cricotireoidostomia '
        );

        $this->createAnswerQuestion(
            $question10->id,
            4,
            'O cuidado com equipe administrativa, equipe de higiene e equipe de segurança, não cabe no planejamento de manejo de via aérea, a presença deles nas proximidades é de responsabilidades deles, assim como orientação de paramentação.'
        );
    }
}
