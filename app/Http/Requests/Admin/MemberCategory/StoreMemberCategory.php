<?php

namespace App\Http\Requests\Admin\MemberCategory;

use Illuminate\Support\Facades\Gate;
use Brackets\Translatable\TranslatableFormRequest;

class StoreMemberCategory extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.member-category.create');
    }
    public function untranslatableRules(): array
    {
        return [
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


        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules(): array
    // {
    //     return [
    //         'title' => ['required', 'string'],

    //     ];
    // }

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