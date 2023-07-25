<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.student.edit', $this->student);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'ordination_name' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'dob' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'phone_no' => ['nullable', 'string'],
            'roll_no' => ['nullable', 'string'],
            'student_type_id' => ['nullable', 'integer'],
            'student_class_id' => ['nullable', 'integer'],
            
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