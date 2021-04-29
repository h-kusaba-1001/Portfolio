<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request):array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'article_comments' => ArticleCommentResource::collection($this->articleComments),
            'like_num' => $this->like_num,
            'today_like_num_from_ip' => $this->today_like_num_from_ip,
            'comment_num' => ArticleCommentResource::collection($this->articleComments)->count(),
            'image_filepath' => $this->image_filepath,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
