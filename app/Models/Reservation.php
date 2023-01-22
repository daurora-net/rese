<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    }
}
