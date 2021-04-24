<?php

namespace App\Http\Resources;

use App\Models\ArticleComment;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleCommentResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // emailは、フロントからデバッグで見れないように隠す
            // 'email' => $this->email,
            'content' => $this->content,
            'permission_flg' => $this->permission_flg,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
