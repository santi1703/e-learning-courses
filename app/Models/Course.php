<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'previous_id'];
    protected $hidden = ['previous_id', 'created_at', 'updated_at'];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}
