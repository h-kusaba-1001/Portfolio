<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Service\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * articleService
     *
     * @var ArticleService
     */
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return ArticleResource
     */
    public function index(Request $request): ArticleCollection
    {
        // peginateされたarticleを受け取る
        $Articles = $this->articleService->getArticleListForFront($request->ip());
        return new ArticleCollection($Articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return ArticleResource
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show(Request $request, int $id): ArticleResource
    {
        $Article = $this->articleService->getArticleForFront($id, $request->ip());

        return new ArticleResource($Article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
    }
}
