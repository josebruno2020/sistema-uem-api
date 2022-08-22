<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = ['module_id', 'name', 'video', 'number'];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
