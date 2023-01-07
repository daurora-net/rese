<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

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
        // if (app(PublishStatusScopeManager::class)->isActive()) {
        static::addGlobalScope('user_id', function (Builder $builder) {
            $user_id = auth()->id();
            $builder->where('user_id', $user_id);
        });
        // 店舗代表者はグローバルスコープを外す
        // static::withoutGlobalScope('is_admin', function (Builder $builder) {
        //     $builder->where('is_admin', false);
        // });
        // }
    }
}