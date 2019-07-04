<?php

namespace App\Models;

use App\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 *
 * @property int id
 * @property string title
 * @property string content
 * @property int user_id
 */
class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id',
    ];

    /**
     * Relations
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
