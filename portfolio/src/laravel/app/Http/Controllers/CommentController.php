<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\CommentRequest;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\CommentRequest $request
     * @return void
     */
    public function store(CommentRequest $request)
    {
        $ArticleComment = new ArticleComment;
        $ArticleComment->fill([
            'article_id' => $request->article_id,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            // 承認フラグは、MySQL側のdefaultで0とする
        ]);
        $ArticleComment->save();
        // 現状特に何もreturnしない
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
