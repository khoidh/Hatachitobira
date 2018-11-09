<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'          => 'required|max:256',
            'description'   => 'required|max:256',
            'slug'          => 'required|max:256',
            'icon'          => 'required|max:256',
            'sort'          => 'required|integer',
            'display'       => 'required|integer',

        ];
    }

    public function attributes()
    {
        return [
            'name'          => __('名前'),
            'description'   => __('説明'),
            'slug'          => __('スラグ'),
            'icon'          => __('アイコン'),
            'sort'          => __('表示順'),
            'display'       => __('表示'),
        ];
    }
}
