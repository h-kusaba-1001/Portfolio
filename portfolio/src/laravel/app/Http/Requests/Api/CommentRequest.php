<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'article_id' => ['required', 'exists:articles,id'],
            'name' => ['required', 'max:' . config('project.page.api.comment.length.name')],
            'email' => ['nullable', 'email', 'max:' . config('project.page.api.comment.length.email')],
            'content' => ['required', 'max:' . config('project.page.api.comment.length.content')],
        ];
    }

    /**
     * attributes
     */
    public function attributes(): array
    {
        return [
            'name' => 'お名前',
            'email' => 'メールアドレス',
            'content' => 'コメント',
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'article_id.required' => 'ブログIDが正しくありません。',
            'article_id.exists' => 'ブログIDが不正です。',
        ];
    }
}
