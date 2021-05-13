<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\Module;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnswerServices {

    protected $question;
    protected $answer;
    protected $user;
    protected $moduleServices;
    public function __construct(Answer $answer, Question $question, User $user, ModuleServices $moduleServices)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->user = $user;
        $this->moduleServices = $moduleServices;
    }

    public function UserAnswer($answers, bool $update = true) : int
    {
        $loggedUser = Auth::user();
        foreach($answers as $question => $answer){
            $answerUser = new AnswerUser();
            $answerUser->question_id = $question;
            $answerUser->user_id = $loggedUser->id;
            $answerUser->answer = $answer;
            $answerUser->save();
        }
        $moduleActive = $loggedUser->module_active;
        if($update) {
            $moduleActive = $this->moduleServices->updateModuleActive($loggedUser);
        }
        

        return $moduleActive;
    }

    

    public function calculatePorcentage(int $correctAnswers, int $numberQuestions)
    {
        return ceil(($correctAnswers / $numberQuestions) * 100); 
        //Porcentagem = (acertos)/(numero de questoes)
    }

}