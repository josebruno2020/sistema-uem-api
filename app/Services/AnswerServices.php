<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnswerServices {

    protected $question;
    protected $answer;
    protected $user;
    public function __construct(Answer $answer, Question $question, User $user)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->user = $user;
    }

    public function UserAnswer(array $answers) : int
    {
        $loggedUser = Auth::user();
        foreach($answers as $question => $answer){
            $answerUser = new AnswerUser();
            $answerUser->question_id = $question;
            $answerUser->user_id = $loggedUser->id;
            $answerUser->answer = $answer;
            $answerUser->save();
        }

        $moduleActive = (intval($loggedUser->module_active) + 1);
        $this->user->where('id', $loggedUser->id)->update([
            'module_active' => $moduleActive
        ]);

        return $moduleActive;
    }

}