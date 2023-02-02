<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class APIRegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_email' => 'required',
            'user_password' => 'required',
            'username' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], 400));
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_email.required' => 'Email is required',
            'user_password.required' => 'Password is required',
        ];
    }

    /* Handle a failed authorization attempt.
    *
    * @return void
    *
    * @throws \Illuminate\Auth\Access\AuthorizationException
    */
    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
         'success'   => false,
         'message'   => 'Forbidden',
     ], 403));
    }
}
