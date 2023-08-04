<?php

namespace App\Http\Requests\Admin\MemberAttendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMemberAttendance extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.member-attendance.edit', $this->memberAttendance);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'date' => ['nullable', 'date'],
            'clock_in' => ['sometimes', 'date_format:H:i:s'],
            'clock_out' => ['sometimes', 'date_format:H:i:s'],
            'early' => ['sometimes', 'date_format:H:i:s'],
            'must_cin' => ['sometimes', 'boolean'],
            'must_cout' => ['sometimes', 'boolean'],
            'att_time' => ['sometimes', 'date_format:H:i:s'],
            'member_id' => ['nullable', 'integer'],
            
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
