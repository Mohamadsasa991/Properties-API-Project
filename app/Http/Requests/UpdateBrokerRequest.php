<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrokerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brokerId = $this->broker->id ?? null; // current broker for unique rule

        return [
            'name' => [$this->isPostRequest() ? 'required' : 'sometimes', 'string', 'max:255', 'unique:brokers,name,' . $brokerId],
            'address' => [$this->isPostRequest() ? 'required' : 'sometimes', 'string', 'max:255'],
            'city' => [$this->isPostRequest() ? 'required' : 'sometimes', 'string'],
            'zip_code' => [$this->isPostRequest() ? 'required' : 'sometimes', 'string'],
            'phone_number' => [$this->isPostRequest() ? 'required' : 'sometimes', 'numeric', 'digits:10'],
            'logo_path' => [$this->isPostRequest() ? 'required' : 'sometimes', 'string'],
        ];
    }

    private function isPostRequest(): bool
    {
        return request()->isMethod('post');
    }
}
