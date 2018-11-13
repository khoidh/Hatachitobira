<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'url'      => 'required|max:256',
            'sort'     => 'required|integer|min:0',
            'type'     => 'required|integer', 
        ];
    }

    public function Attributes()
    {
        return [
            'category_id'   => __('カテゴリ'),
            'url'           => __('Url'),
            'sort'          => __('Sort'),
            'type'          => __('タイプ'),
        ];
    }
}
