<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $teacher
 */
class Course extends Model
{
    const CTYPE_VIDEO_URL = 0;
    const CTYPE_VIDEO_FILE = 1;
    const CTYPE_PROJECT = 2;
    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVED = 2;
    const STATUS_REJECTED = 3;

    protected $fillable = ['name', 'description', 'cost', 'status', 'teacher_id', 'course_category_id', 'avatar', 'cover'];

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

    public function category(){
        return $this->belongsTo(CourseCategory::class);
    }
}
