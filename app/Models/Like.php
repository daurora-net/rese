<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function shop()
    {
        return $this->BelongsTo(Shop::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    // public function isLike($postId)
    // {
    //     return $this->likes()->where('post_id', $postId)->exists();
    // }

    // public function like($postId)
    // {
    //     if ($this->isLike($postId)) {
    //     } else {
    //         $this->likes()->attach($postId);
    //     }
    // }

    // public function unlike($postId)
    // {
    //     if ($this->isLike($postId)) {
    //         $this->likes()->detach($postId);
    //     } else {
    //     }
    // }
}