<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Review extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function reservation()
    {
        return $this->BelongsTo(Reservation::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    protected static function booted()
    {
        static::addGlobalScope('user_id', function (Builder $builder) {

            $user_id = auth()->id();
            $builder->where('user_id', $user_id);
        });
    }
    // public static function whereDate($reservation_list, $review_list)
    // {
    //     $query = self::query();
    //     if (!empty($reservation_list)) {
    //         $query->whereDate('started_at', '<', Carbon::now())->orderBy('started_at', 'asc');
    //     }
    //     if (!empty($review_list)) {
    //         $query->whereDate('started_at', '>', Carbon::now())->orderBy('started_at', 'asc');
    //     }
    //     $results = $query->get();
    //     return $results;
    // }
}