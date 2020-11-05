<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditFaqRequest extends FormRequest
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
        if($this->isMethod('post')) {
            return [
                'for_app' => Rule::in(config('custom-config.faq.static_values.for_app'))
            ];
        }
        else {
            return [];
        }
    }
}
