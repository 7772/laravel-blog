<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 *
 * @property string comment
 * @property int commentable_id
 * @property string commentable_type
 */
class Comment extends Model
{
    protected $fillable = [
        'comment', 'commentable_id', 'commentable_type',
    ];

    /**
     * Relations
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
