<?php

namespace App\Http\Requests\Admin\AffiliatedGroup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Brackets\Translatable\TranslatableFormRequest;

class UpdateAffiliatedGroup extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.affiliated-group.edit', $this->affiliatedGroup);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function untranslatableRules(): array
    {
        return [
            'enabled' => ['required', 'boolean'],
            'affiliated_group_category_id' => ['nullable', 'integer'],
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array
    {
        return [
            'title' => ['required', 'string'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],


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