<?php

namespace App\Service;

use App\Models\ArticleComment;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleCommentService
{
    /**
     * getCommentListForAdmin
     *
     * @param  array $req
     * @return LengthAwarePaginator
     */
    public function getCommentListForAdmin($req) : LengthAwarePaginator
    {
        $articleCommentQuery = ArticleComment::latest();

        // 未承認のみ表示フラグがあった場合
        // または、画面初期表示時に、、検索条件に未承認のみのコメントを追加
        if ((isset($req['only_not_permitted']) && $req['only_not_permitted'] == 1)
            || !isset($req['only_not_permitted'])
        ) {
            $articleCommentQuery->where('permission_flg', config('project.const.flg.off'));
        }

        return $articleCommentQuery->paginate(config('project.const.per_page.admin'));
    }
}
