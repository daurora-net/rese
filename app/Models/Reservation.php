<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['started_at'];
    protected $fillable = ['user_id', 'shop_id', 'started_at', 'num_of_users'];

    public function shop()
    {
        return $this->BelongsTo(Shop::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    protected static function booted()
    {
        // static::addGlobalScope('user_id', function (Builder $builder) {

        //     $user_id = auth()->id();
        //     $builder->where('user_id', $user_id);
        // });
    }
}
