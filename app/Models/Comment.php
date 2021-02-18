<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['parent_id', 'name', 'avatar', 'comment'];

    /**
     * Get the replies of a comment
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->latest();
    }
}
