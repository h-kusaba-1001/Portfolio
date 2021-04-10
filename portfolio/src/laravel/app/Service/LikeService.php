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
    public function getIsEnableLikeForBlog(string $ip): bool
    {
        $todayLikeNumFromIp = Like::whereNull('article_id')
            ->whereNull('comment_id')
            ->enableLike($ip)
            ->count();

        return $this->getIsEnableLike($todayLikeNumFromIp);
    }

    /**
     * likeBlog
     *
     * @param  string $ip
     * @return void
     */
    public function likeBlog(string $ip)
    {
        $like = new Like;
        $like->ip_address = $ip;
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
