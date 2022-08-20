<?php

namespace App\Models;

use App\Helper\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';
    protected $fillable = [
        'name',
        'description',
        'slug',
        'cover'
    ];
    protected $appends = ['class', 'img'];

    public function classes(): HasMany
    {
        return $this->hasMany(ClassModel::class);
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }



    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'users_modules',
            'module_id',
            'user_id'
        );
    }

    public function getClassAttribute()
    {
        return $this->classes()->get();
    }

    public function getImgAttribute()
    {
        return $this->cover ? ImageHelper::getFullPath().$this->cover : null;
    }

}
