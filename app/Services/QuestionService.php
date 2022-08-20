<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    public static function createQuestion(int $quizId, int $number, int $correct, string $question): Question
    {
        return Question::create([
            'quiz_id' => $quizId,
            'number' => $number,
            'correct' => $correct,
            'question' => $question
        ]);
    }
}
