<?php

namespace App\Service;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    /**
     * getArticleQuery
     *
     * @return Builder
     */
    public function getArticleQuery() : Builder
    {
        $article_query = Article::withCount([
                'articleComments as comment_num',
                'likes as like_num',
            ])
            ->latest();

        return $article_query;
    }

    /**
     * getArticleListForAdmin
     *
     * @return LengthAwarePaginator
     */
    public function getArticleListForAdmin() : LengthAwarePaginator
    {
        $article_query = $this->getArticleQuery();
        return $article_query->paginate(config('project.const.per_page.admin'));
    }

    /**
     * getArticleListForFront
     *
     * @param  string $ip
     * @return LengthAwarePaginator
     */
    public function getArticleListForFront(string $ip) : LengthAwarePaginator
    {
        $article_query = $this->getArticleQuery();
        $article_query->with([
                'articleComments' => function($query) {
                    return $query->permitted();
                }
            ])
            ->withCount([
                'likes as today_like_num_from_ip' => function($query) use($ip) {
                    return $query->enableLike($ip);
                }
            ]);

        return $article_query->paginate(config('project.const.per_page.front'));
    }
}
