<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['statement', 'score', 'multiple', 'exhaustive', 'lesson_id'];
    protected $hidden = ['lesson_id', 'created_at', 'updated_at'];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
