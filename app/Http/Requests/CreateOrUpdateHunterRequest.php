<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// https://laravel.com/docs/8.x/validation#form-request-validation
// https://laravel.com/docs/8.x/csrf
class CreateOrUpdateHunterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5',
            'src' => 'required',
            'description' => 'required',
        ];
    }
}
