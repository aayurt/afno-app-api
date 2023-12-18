<?php

namespace App\Http\Requests\Admin\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRestaurant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.restaurant.edit', $this->restaurant);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'sub_title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'phone_number' => ['nullable', 'string'],
            'alternate_phone_number' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'instagram' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'youtube' => ['nullable', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'monday_open_time' => ['nullable', 'date_format:H:i:s'],
            'monday_close_time' => ['nullable', 'date_format:H:i:s'],
            'tuesday_open_time' => ['nullable', 'date_format:H:i:s'],
            'tuesday_close_time' => ['nullable', 'date_format:H:i:s'],
            'wednesday_open_time' => ['nullable', 'date_format:H:i:s'],
            'wednesday_close_time' => ['nullable', 'date_format:H:i:s'],
            'thursday_open_time' => ['nullable', 'date_format:H:i:s'],
            'thursday_close_time' => ['nullable', 'date_format:H:i:s'],
            'friday_open_time' => ['nullable', 'date_format:H:i:s'],
            'friday_close_time' => ['nullable', 'date_format:H:i:s'],
            'saturday_open_time' => ['nullable', 'date_format:H:i:s'],
            'saturday_close_time' => ['nullable', 'date_format:H:i:s'],
            'sunday_open_time' => ['nullable', 'date_format:H:i:s'],
            'sunday_close_time' => ['nullable', 'date_format:H:i:s'],
            
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
