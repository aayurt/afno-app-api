<?php

namespace App\Http\Requests\Admin\Member;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMember extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.member.edit', $this->member);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function translatableRules($locale): array
    {
        return [
            'title' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],


        ];
    }
    public function untranslatableRules(): array
    {
        return [
            'enabled' => ['required', 'boolean'],
            'branch_id' => ['nullable', 'integer'],
            'member_category_id' => ['nullable', 'integer'],
            'msg' => ['nullable', 'string'],
            'name' => ['required', 'string'],
            'ordination_name' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'dob' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'phone_no' => ['nullable', 'string'],

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