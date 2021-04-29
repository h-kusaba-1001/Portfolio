<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\ArticleLikeRequest;
use App\Http\Requests\Api\PortfolioLikeRequest;
use App\Service\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * likeService
     *
     * @var LikeService
     */
    private $likeService;

    /**
     * __construct
     *
     * @param LikeService $likeService
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getPortofolioLikesInfo(Request $request): array
    {
        // ポートフォリオのいいね数と、いいね可能かどうかを取得
        return $this->likeService->getPortofolioLikesInfo($request->ip());
    }

    /**
     * ポートフォリオのいいね機能
     *
     * @param PortfolioLikeRequest $request
     */
    public function likePortfolio(PortfolioLikeRequest $request)
    {
        $this->likeService->likePortfolio($request->ip());
    }

    /**
     * ブログ記事のいいね機能
     *
     * @param ArticleLikeRequest $request
     */
    public function likeArticle(ArticleLikeRequest $request)
    {
        $this->likeService->likeArticle($request->ip(), $request->article_id);
    }
}
