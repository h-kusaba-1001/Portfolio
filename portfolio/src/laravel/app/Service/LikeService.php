<?php

namespace App\Service;

use App\Models\Like;

class LikeService
{
    /**
     * getPortofolioLikesInfo
     *
     * @param  string $ip
     * @return array
     */
    public function getPortofolioLikesInfo(string $ip): array
    {
        $likeNum = Like::whereNull('article_id')
            ->whereNull('comment_id')
            ->count();

        $isEnableLike = $this->getIsEnableLikeForPortfolio($ip);

        return compact(['likeNum', 'isEnableLike']);
    }

    /**
     * getIsEnableLikeForPortfolio
     *
     * @param  string $ip
     * @return bool
     */
    public function getIsEnableLikeForPortfolio(string $ip): bool
    {
        $todayLikeNumFromIp = Like::whereNull('article_id')
            ->whereNull('comment_id')
            ->enableLike($ip)
            ->count();

        return $this->getIsEnableLike($todayLikeNumFromIp);
    }

    /**
     * likePortfolio
     *
     * @param  string $ip
     * @return void
     */
    public function likePortfolio(string $ip)
    {
        $like = new Like;
        $like->ip_address = $ip;
        $like->save();
    }

    /**
     * getIsEnableLikeForArticle
     *
     * @param  string $ip
     * @param  int $articleId
     * @return bool
     */
    public function getIsEnableLikeForArticle(string $ip, int $articleId): bool
    {
        $todayLikeNumFromIp = Like::whereNull('comment_id')
            ->where('article_id', $articleId)
            ->enableLike($ip)
            ->count();

        return $this->getIsEnableLike($todayLikeNumFromIp);
    }

    /**
     * likeArticle
     *
     * @param  string $ip
     * @param  int $articleId
     * @return void
     */
    public function likeArticle(string $ip, int $articleId)
    {
        $like = new Like;
        $like->ip_address = $ip;
        $like->article_id = $articleId;
        $like->save();
    }

    /**
     * getIsEnableLike
     *
     * @param  int $todayLikeNumFromIp
     * @return bool
     */
    private function getIsEnableLike(int $todayLikeNumFromIp): bool
    {
        return $todayLikeNumFromIp === 0 ? true : false;
    }
}
