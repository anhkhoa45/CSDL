<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function getTotalBuyers()
    {
        $buyers = $this->buyers->count();
        return $buyers;
    }

    public function getBuyersInPeriod($period)
    {
        $buyers = 0;
        foreach ($this->buyers as $buyer){
            if($buyer->pivot->date_bought >= Carbon::now()->subDays($period)->toDateTimeString()){
                $buyers++;
            };
        }
        return $buyers;
    }

    public function getMonthlyBuyers()
    {
        $monthlyBuyers = DB::table('buy_courses')
            ->select([DB::raw("date_trunc('month', date_bought) as month"), DB::raw('COUNT(buyer_id) as buyers')])
            ->where('course_id', $this->id)
            ->groupBy(DB::raw("date_trunc('month', date_bought)"))
            ->orderBy(DB::raw("date_trunc('month', date_bought)"))->get();

        return $monthlyBuyers;
    }
}
