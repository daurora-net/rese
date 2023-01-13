<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Shop extends Model
{
    use HasFactory, Favoriteable;

    protected $guarded = array('id');

    public function area()
    {
        return $this->BelongsTo(Area::class);
    }
    public function genre()
    {
        return $this->BelongsTo(Genre::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public static function doSearch($keyword, $area_id, $genre_id)
    {
        $query = self::query();
        if (!empty($keyword)) {
            $query->where('name', 'like binary', "%{$keyword}%");
        }
        if (!empty($area_id)) {
            $query->where('area_id', 'like binary', "%{$area_id}%");
        }
        if (!empty($genre_id)) {
            $query->where('genre_id', 'like binary', "%{$genre_id}%");
        }
        $results = $query->get();
        return $results;
    }
    function isSelectedReservation($reservation_id)
    {
        return $this->reservation_id == $reservation_id ? 'selected' : '';
    }
}
