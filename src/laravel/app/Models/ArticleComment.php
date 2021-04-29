<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * getPermissionStringAttribute
     *
     * @return string $result
     */
    public function getPermissionStringAttribute(): string
    {
        $result = '';

        if ($this->permission_flg === config('project.const.flg.on')) {
            $result = '承認';
        } elseif ($this->permission_flg === config('project.const.flg.off')) {
            $result = '未承認';
        }
        return $result;
    }

    /**
     * 承認済みのスコープ
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePermitted($query): Builder
    {
        return $query->where('permission_flg', config('project.const.flg.on'));
    }
}
