<?php

namespace App\Http\Requests\Api;

use App\Service\LikeService;
use Illuminate\Foundation\Http\FormRequest;

class PortfolioLikeRequest extends FormRequest
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
     * @param LikeService $likeService
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
            //
        ];
    }

    /**
     * バリデータインスタンスの設定
     *
     * @param \Illuminate\Validation\Validator $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // ポートフォリオのいいね可能かどうかを確認するバリデーション
            if ($this->likeService->getIsEnableLikeForPortfolio($this->ip()) === false) {
                $validator->errors()->add('invalid_like', __('validation.custom.like.invalid_like'));
            }
        });
    }
}
