<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        if (request()->method() == "POST") {
            return [
                'title' => ['required', 'string', 'min:3', 'max:191'],
                'brief' => ['required', 'string', 'min:3', 'max:191'],
                'body' => ['required', 'string', 'min:3'],
                'status' => ['required'],
                'published_at' => ['required', 'date'],
                'category_id' => ['required', 'exists:categories,id'],
                'image' => ['required', 'file'],
                'tag' => ['required', 'string'],
            ];
        }
        else{
            return [
                'title' => ['required', 'string', 'min:3', 'max:191'],
                'brief' => ['required', 'string', 'min:3', 'max:191'],
                'body' => ['required', 'string', 'min:3'],
                'status' => ['required'],
                'published_at' => ['required', 'date'],
                'category_id' => ['required', 'exists:categories,id'],
                'tag' => ['required', 'string'],
            ];
        }

    }
}
