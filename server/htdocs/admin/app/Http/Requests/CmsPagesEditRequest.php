<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsPagesEditRequest extends FormRequest
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

        // If request is from post method then need to run validation else not required
        if($this->isMethod('post') && !$this->has('CKEditor')) {
            return [
                'title' => 'required|string|max:100',
                'slug'  => 'required|string|max:255|unique:cms_pages,slug,'.$this->id,
                'content' => 'required|string',
            ];
        }else {
            return [];
        }
    }
}
