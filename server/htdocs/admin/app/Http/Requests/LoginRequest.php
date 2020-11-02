<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 *
 * @purpose : This class is used for validate login user request
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Http\Requests
 */
class LoginRequest extends FormRequest
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
        return
            [
                'email_address' => 'required|string|min:3|max:255',
                'password' => 'required|string'
            ];
    }
}
