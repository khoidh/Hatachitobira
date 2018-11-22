<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopVideosRequest extends FormRequest
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
            'video_type_id'     => 'required|integer',
            'title'             => 'required|max:256',
            'thumbnail'         => 'required|max:256',
            'youtube_url'       => 'required|max:256',
        ];
    }

    public function Attributes()
    {
        return [
            'video_type_id'     => __('動画タイプ'),
            'title'             => __('タイトル'),
            'thumbnail'         => __('サムネイル'),
            'youtube_url'       => __('YoutubeURL'),
        ];
    }
}
