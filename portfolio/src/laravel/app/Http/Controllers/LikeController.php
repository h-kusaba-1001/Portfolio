<?php

namespace App\Http\Controllers;

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
     * @param  LikeService $likeService
     * @return void
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    /**
     * @param  Request $request
     * @return array
     */
    public function getPortofolioLikesInfo(Request $request): array
    {
        // ポートフォリオのいいね数と、いいね可能かどうかを取得
        return $this->likeService->getPortofolioLikesInfo($request->ip());
    }

    /**
     * @param  PortfolioLikeRequest $request
     * @return void
     */
    public function likePortfolio(PortfolioLikeRequest $request)
    {
        $this->likeService->likePortfolio($request->ip());
    }
}
