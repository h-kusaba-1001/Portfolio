<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\BulkUpdatePermissionRequest;
use App\Models\ArticleComment;
use App\Service\ArticleCommentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * $articleCommentService
     *
     * @var ArticleCommentService
     */
    protected ArticleCommentService $articleCommentService;

    public function __construct(ArticleCommentService $articleCommentService)
    {
        $this->articleCommentService = $articleCommentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $req = $request->query();
        $Comments = $this->articleCommentService->getCommentListForAdmin($req)
            ->appends($req);

        return view('admin.comment.index', compact('Comments'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $request->all();
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

    /**
     * bulkUpdatePermission
     *
     * @param  BulkUpdatePermissionRequest $request
     * @return int $resultNum
     */
    public function bulkUpdatePermission(BulkUpdatePermissionRequest $request)
    {
        $resultNum = ArticleComment::whereIn('id', $request->commentIds)
            ->update(['permission_flg' => config('project.const.flg.on')]);

        session()->flash(
            'success',
            'ArticleComment:コメントの一括承認に成功しました ' . $resultNum . '件'
        );
        return $resultNum;
    }

    /**
     * bulkUpdatePermission
     *
     * @param  BulkUpdatePermissionRequest $request 実際にはbulkUpdateではないが、バリデーションメソッドを使いまわす
     * @return int $resultNum
     */
    public function bulkDelete(BulkUpdatePermissionRequest $request)
    {
        $resultNum = ArticleComment::destroy($request->commentIds);

        session()->flash(
            'success',
            'ArticleComment:コメントの削除に成功しました ' . $resultNum . '件'
        );
        return $resultNum;
    }
}
