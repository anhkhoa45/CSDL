<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $teacher
 */
class Course extends Model
{
    protected $fillable = ['name', 'description', 'cost', 'status', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function buyers()
    {
        return $this->belongsToMany(
                User::class,
                'buy_courses',
                'course_id',
                'buyer_id'
        )->withPivot('date_bought', 'rating');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function projects()
    {
        return $this->hasMany(RequiredProject::class);
    }
}
