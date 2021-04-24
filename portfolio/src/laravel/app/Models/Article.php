<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleComment;
use App\Models\Like;

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

    public function articleComments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * getShortlyContentAttribute
     * 本文の最初の12文字を整形して返すアクセサ
     *
     * @return string
     */
    public function getShortlyContentAttribute()
    {
        $length = 12;
        $shortContent = substr($this->content, 0, $length);
        if (mb_strlen($this->content) > $length) {
            $shortContent .= '...';
        }
        return $shortContent;
    }
}
