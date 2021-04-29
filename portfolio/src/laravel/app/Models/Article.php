<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    public function articleComments(): HasMany
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
