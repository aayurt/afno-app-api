<?php

namespace App\Http\Requests\Admin\Activity;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateActivity extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.activity.edit', $this->activity);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function untranslatableRules(): array
    {
        return [
            'link' => ['nullable', 'string'],
            'fullWidth' => ['sometimes', 'boolean'],
            'enabled' => ['sometimes', 'boolean'],
            'textTop' => ['sometimes', 'boolean'],
            'textDark' => ['sometimes', 'boolean'],

        ];
    }



    public function translatableRules($locale): array
    {
        return [
            'title' => ['nullable', 'string'],
            'subtitle' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
        ];
    }
    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}