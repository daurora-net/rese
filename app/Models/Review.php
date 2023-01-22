<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function shop()
    {
        return $this->BelongsTo(Shop::class);
    }
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
}
