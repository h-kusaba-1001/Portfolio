<?php

namespace App\Service;

use App\Models\ArticleComment;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleCommentService
{
    /**
     * getCommentListForAdmin
     *
     * @return LengthAwarePaginator
     */
    public function getCommentListForAdmin() : LengthAwarePaginator
    {
        $articleCommentQuery = ArticleComment::latest();
        return $articleCommentQuery->paginate(config('project.const.per_page.admin'));
    }
}
