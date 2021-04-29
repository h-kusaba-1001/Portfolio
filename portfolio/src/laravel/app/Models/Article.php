<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleComment;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use SoftDeletes;

    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    public function articleComments():HasMany
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function likes():HasMany
    {
        return $this->hasMany(Like::class);
    }
}
