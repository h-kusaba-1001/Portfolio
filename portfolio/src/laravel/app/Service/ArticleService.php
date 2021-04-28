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
        $articleQuery = Article::withCount([
                'articleComments as comment_num' => function ($query) {
                    return $query->permitted();
                },
                'likes as like_num',
            ])
            ->latest();

        return $articleQuery;
    }

    /**
     * getArticleListForAdmin
     *
     * @return LengthAwarePaginator
     */
    public function getArticleListForAdmin() : LengthAwarePaginator
    {
        $articleQuery = $this->getArticleQuery();
        return $articleQuery->paginate(config('project.const.per_page.admin'));
    }

    /**
     * getArticleListForFront
     *
     * @param  string $ip
     * @return LengthAwarePaginator
     */
    public function getArticleListForFront(string $ip) : LengthAwarePaginator
    {
        $articleQuery = $this->getArticleQuery();
        $articleQuery->with([
                'articleComments' => function ($query) {
                    return $query->permitted();
                }
            ])
            ->withCount([
                'likes as today_like_num_from_ip' => function ($query) use ($ip) {
                    return $query->enableLike($ip);
                }
            ]);

        return $articleQuery->paginate(config('project.const.per_page.front'));
    }

    /**
     * getArticleForFront
     *
     * @param  int $id
     * @param  string $ip
     * @return Article
     */
    public function getArticleForFront(int $id, string $ip) : Article
    {
        $articleQuery = $this->getArticleQuery();
        return $articleQuery
            ->with([
                'articleComments' => function ($query) {
                    return $query->permitted();
                }
            ])
            ->withCount([
                'likes as today_like_num_from_ip' => function ($query) use ($ip) {
                    return $query->enableLike($ip);
                },
            ])
            ->FindOrFail($id);
    }
}
