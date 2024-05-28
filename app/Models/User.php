<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }

    public function getCourses(): object
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            $course->attributes['can_access'] = is_null($course->previous_id) || $this->courses()
                    ->where(function ($query) use ($course) {
                        return $query->where('id', $course->id)
                            ->orWhere('id', $course->previous_id);
                    })
                    ->exists();
        }

        return response()->json(['courses' => $courses]);
    }

    public function getLessons(int $courseId): object
    {
        $lessons = Lesson::where('course_id', $courseId)->get();

        foreach ($lessons as $lesson) {
            $lesson->attributes['can_access'] = is_null($lesson->previous_id) || $this
                    ->lessons()
                    ->where(function ($query) use ($lesson) {
                        return $query->where('id', $lesson->id)
                            ->orWhere('previous_id', $lesson->id);
                    })
                    ->exists();
        }

        return response()->json(['lessons' => $lessons]);
    }

    public function getLessonDetails(int $lessonId): object
    {
        $lesson = Lesson::with(['course', 'questions', 'questions.answers'])->where('id', $lessonId)->first();

        if (!$lesson) {
            return response()->json(['error' => 'User does not have access to this lesson.']);
        }

        $isLessonAccessible = is_null($lesson->previous_id) || $this
                ->lessons()
                ->where(function ($query) use ($lesson) {
                    return $query->where('id', $lesson->id)
                        ->orWhere('previous_id', $lesson->id);
                })
                ->exists();

        if (!$isLessonAccessible) {
            return response()->json(['error' => 'User does not have access to this lesson.']);
        }

        return response()->json(['lesson' => $lesson]);
    }
}
