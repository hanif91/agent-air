<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'nama' => ['required','string'],
            'alamat' => ['required','string'],
            'harga' => ['required','numeric'],
            'qty' => ['required','numeric']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
           'harga' => str_replace(',','',$this->harga)
        ]);
    }
}
