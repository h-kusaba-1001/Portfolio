<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticleComment extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    /**
     * likes
     *
     * @return HasMany
     */
    public function likes() : HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * getPermissionStringAttribute
     *
     * @return string
     */
    public function getPermissionStringAttribute() : string
    {
        return '';
    }
}
