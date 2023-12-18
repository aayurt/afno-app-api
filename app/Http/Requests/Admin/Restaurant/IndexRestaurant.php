<?php

namespace App\Http\Requests\Admin\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexRestaurant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.restaurant.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,title,location,enabled,phone_number,alternate_phone_number,link,email,instagram,facebook,youtube,latitude,longitude,monday_open_time,monday_close_time,tuesday_open_time,tuesday_close_time,wednesday_open_time,wednesday_close_time,thursday_open_time,thursday_close_time,friday_open_time,friday_close_time,saturday_open_time,saturday_close_time,sunday_open_time,sunday_close_time|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
