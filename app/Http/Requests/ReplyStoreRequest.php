<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "reply" => "max:1000|required",
        ];
    }

    public function messages(){
        return[
            "reply.max"=> "Sorry man, this is just a reply not journal, please shorten the repyly",
            "reply.required"=> "Really, empty?",
        ];
    }
}
