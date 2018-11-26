<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColumnRequest extends FormRequest
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
    public function rules()
    {
        return [
            'category_id'   => 'required',
            'title'         => 'required|max:256',
            'description'   => 'required|max:256',
            'content'       => 'required|max:10000',
            'image'         => 'required|max:256',
            'sort'          => 'required|integer|min:0',
            'type'          => 'required|integer|min:0',
        ];
    }
    public function Attributes()
    {
        return [
            'category_id'   => __('カテゴリ'),
            'title'         => __('タイトル'),
            'description'   => __('説明'),
            'content'       => __('コンテンツ'),
            'image'         => __('イメージ'),
            'sort'          => __('表示順'),
            'type'          => __('タイプ'),
        ];
    }
}
