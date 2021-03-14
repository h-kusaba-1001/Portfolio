<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\ArticleComment;

class Like extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function articleComment()
    {
        return $this->belongsTo(ArticleComment::class);
    }
}
