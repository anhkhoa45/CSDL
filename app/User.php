<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $teachingCourses
 */
class User extends Authenticatable
{
    use Notifiable;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;

    protected $fillable = [
        'name', 'email', 'password', 'DOB', 'gender', 'address',
        'balance', 'level', 'learning_score', 'teaching_score', 'avatar',
        'description'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teachingCourses(){
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function enrolledCourses(){
        return $this->belongsToMany(
                Course::class,
                'buy_courses',
                'buyer_id',
                'course_id'
        )->withPivot('date_bought', 'rating');
    }
}
