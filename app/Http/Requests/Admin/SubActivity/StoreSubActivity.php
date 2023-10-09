<?php

namespace App\Http\Requests\Admin\SubActivity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSubActivity extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.sub-activity.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'activity_id' => ['nullable', 'integer'],
            'title' => ['nullable', 'string'],
            'subtitle' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
            'fullWidth' => ['required', 'boolean'],
            'enabled' => ['required', 'boolean'],
            'textTop' => ['required', 'boolean'],
            'textDark' => ['required', 'boolean'],
            
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
