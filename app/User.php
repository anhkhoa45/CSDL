<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $teaching_courses
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'DOB', 'gender', 'address',
        'balance', 'level', 'role', 'learning_score', 'teaching_score', 'avatar',
        'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teaching_courses(){
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function enrolled_courses(){
        return $this->belongsToMany(
                Course::class,
                'buy_courses',
                'buyer_id',
                'course_id'
        )->withPivot('date_bought', 'rating');
    }
}
