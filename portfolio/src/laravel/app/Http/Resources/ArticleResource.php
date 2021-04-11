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
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'article_comments' => ArticleCommentResource::collection($this->articleComments),
            'image_filepath' => $this->image_filepath,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
