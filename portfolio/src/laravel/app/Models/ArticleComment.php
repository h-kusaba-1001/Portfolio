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
     * @return string $result
     */
    public function getPermissionStringAttribute() : string
    {
        $result = '';
        if($this->permission_flg === config('project.const.flg.on')) {
            $result = '承認';
        } else if ($this->permission_flg === config('project.const.flg.off')) {
            $result = '未承認';
        }
        return $result;
    }
}
