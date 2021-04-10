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

        $todayLikeNumFromIp = Like::whereNull('article_id')
            ->whereNull('comment_id')
            ->enableLike($ip)
            ->count();

        $isEnableLike = $this->getIsEnableLike($todayLikeNumFromIp);

        return compact(['likeNum', 'isEnableLike']);
    }

    /**
     * getIsEnableLike
     *
     * @param  mixed $todayLikeNumFromIp
     * @return bool
     */
    private function getIsEnableLike(int $todayLikeNumFromIp): bool
    {
        return $todayLikeNumFromIp === 0 ? true : false;
    }
}
