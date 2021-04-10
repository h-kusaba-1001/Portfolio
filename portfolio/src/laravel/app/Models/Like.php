<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\ArticleComment;

class Like extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function articleComment()
    {
        return $this->belongsTo(ArticleComment::class);
    }

    /**
     * scopeEnableLike
     * 該当IPアドレスから当日のいいねがあるかを検索する
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $ip
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnableLike(Builder $query, string $ip): Builder
    {
        return $query->where('ip_address', $ip)
            ->where('created_at', '>=', date('Y-m-d 00:00:00'));
    }
}
