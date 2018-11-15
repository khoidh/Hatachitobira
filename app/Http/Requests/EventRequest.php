<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'category_id'   => 'required|integer|min:0',
            'title'         => 'required|max:256',
            'image'         => 'required|max:256',
            'content'       => 'required|max:10000',
            'sort'          => 'required|integer|min:0',
            'time_from'     => 'required|date',
            'time_to'       => 'required|date|after:time_from',
            'started_at'    => 'required|date',
            'closed_at'     => 'required|date|after:started_at',
            'address'       => 'required|max:256',
            'overview'      => 'required|max:10000',
            'capacity'      => 'required|integer|min:0',
            'entry_fee'     => 'required|integer|min:0',

        ];
    }
    public function Attributes()
    {
        return [
            'category_id'   => __('カテゴリ'),
            'title'         => __('タイトル'),
            'image'         => __('イメージ'),
            'content'       => __('コンテンツ'),
            'sort'          => __('Sort'),
            'time_from'     => __('受付期間（開始）'),
            'time_to'       => __('受付期間（終了）'),
            'started_at'    => __('日程（開始）'),
            'closed_at'     => __('日程（終了）'),
            'address'       => __('住所'),
            'overview'      => __('概要'),
            'capacity'      => __('定員'),
            'entry_fee'     => __('参加費'),

        ];
    }
}
