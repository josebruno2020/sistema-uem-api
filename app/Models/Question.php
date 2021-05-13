<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = ['number', 'question', 'correct' ,'module_id'];
    protected $appends = ['answers'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getAnswersAttribute()
    {
        return $this->answers()->get();
    }
}
