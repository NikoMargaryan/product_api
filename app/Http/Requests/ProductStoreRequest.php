<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
    /** @var array */
    public function rules()
    {
        if ($this->getMethod() == 'POST') {
            return [
                'name' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required|string',
            ];
        } else {
            return [
                'name' => 'required|string|max:258',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required|string',
            ];
        }
    }

    public function messages()
    {
        if ($this->getMethod() == 'POST') {
            return [
                'name.required' => 'Name is required!',
                'image.required' => 'Image is required!',
                'description.required' => 'Description is required!',
            ];
        } else {
            return [
                'name.required' => 'Name is required!',
                'description.required' => 'Description is required!',
            ];
        }
    }
}
