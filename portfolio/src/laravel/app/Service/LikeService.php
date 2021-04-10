<?php

namespace App\Service;

use App\Models\Like;

class LikeService
{
    /**
     * getBlogLikesInfo
     *
     * @param  string $ip
     * @return array
     */
    public function getBlogLikesInfo(string $ip) : array
    {
        $likeNum = Like::whereNull('article_id')
            ->whereNull('comment_id')
            ->count();

        $isEnableLike = $this->getIsEnableLikeForBlog($ip);

        return compact(['likeNum', 'isEnableLike']);
    }

    /**
     * getIsEnableLikeForBlog
     *
     * @param  string $ip
     * @return bool
     */
    private function getIsEnableLikeForBlog(string $ip): bool
    {
        $todayLikeNumFromIp = Like::whereNull('article_id')
            ->whereNull('comment_id')
            ->enableLike($ip)
            ->count();

        return $this->getIsEnableLike($todayLikeNumFromIp);
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
