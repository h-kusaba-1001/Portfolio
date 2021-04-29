<?php

namespace App\Http\Requests\Admin\Comment;

use App\Models\ArticleComment;
use Illuminate\Foundation\Http\FormRequest;

class BulkUpdatePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        $commentIds = ArticleComment::All()->pluck('id')->toArray();
        return [
            // 配列のバリデーションを丸々existsすると遅いので、全件取得に対して検証する
            'commentIds.*' => 'in:' . implode(',', $commentIds),
        ];
    }
}
