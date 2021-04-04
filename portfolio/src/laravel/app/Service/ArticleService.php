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
     * @return LengthAwarePaginator
     */
    public function getArticleListForFront() : LengthAwarePaginator
    {
        $article_query = $this->getArticleQuery();
        $article_query->with([
                'articleComments' => function($query) {
                    return $query->permitted();
                }
            ]);
        return $article_query->paginate(config('project.const.per_page.front'));
    }
}
