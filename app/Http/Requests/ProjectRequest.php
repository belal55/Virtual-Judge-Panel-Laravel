<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required',
            'short_desc' => 'required',
            'category' => 'required',
            'projectFile' => 'required|mimetypes:application/zip|max:204800',
            'projectVideo' => 'required|mimetypes:video/avi,video/mpeg,video/mp4|max:204800',
        ];
    }
}
