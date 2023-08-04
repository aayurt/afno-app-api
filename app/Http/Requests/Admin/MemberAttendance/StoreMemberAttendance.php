<?php

namespace App\Http\Requests\Admin\MemberAttendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMemberAttendance extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.member-attendance.create');
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
            'clock_in' => ['required', 'date_format:H:i:s'],
            'clock_out' => ['required', 'date_format:H:i:s'],
            'early' => ['required', 'date_format:H:i:s'],
            'must_cin' => ['required', 'boolean'],
            'must_cout' => ['required', 'boolean'],
            'att_time' => ['required', 'date_format:H:i:s'],
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
