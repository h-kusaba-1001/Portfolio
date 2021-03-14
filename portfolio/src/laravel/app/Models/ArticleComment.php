<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class ArticleComment extends Model
{
    use SoftDeletes;

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
