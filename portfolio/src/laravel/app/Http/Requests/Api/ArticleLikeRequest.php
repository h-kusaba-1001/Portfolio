<?php

namespace App\Http\Requests\Api;

use App\Service\LikeService;
use Illuminate\Foundation\Http\FormRequest;

class ArticleLikeRequest extends FormRequest
{
    /**
     * likeService
     *
     * @var LikeService
     */
    private $likeService;

    /**
     * __construct
     *
     * @param  LikeService $likeService
     * @return void
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
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
        return [
            'article_id' => ['required', 'integer', 'exists:articles,id'],
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages():array
    {
        return [
            'article_id.required'   => 'ブログIDが不正です',
            'article_id.integer'    => 'ブログIDが不正です',
            'article_id.exists'     => 'ブログIDが不正です',
        ];
    }

    /**
     * バリデータインスタンスの設定
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // ポートフォリオのいいね可能かどうかを確認するバリデーション
            if (false === $this->likeService->getIsEnableLikeForArticle($this->ip(), $this->article_id)) {
                $validator->errors()->add('invalid_like', __('validation.custom.like.invalid_like'));
            }
        });
    }
}
