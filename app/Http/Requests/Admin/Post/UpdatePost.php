<?php

namespace App\Http\Requests\Admin\Post;

use Carbon\Carbon;
use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePost extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.post.edit', $this->post);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'published_at' => ['nullable', 'date'],
            'enabled' => ['sometimes', 'boolean'],
            'popularity' => ['sometimes', 'integer'],
            'category_id' => ['nullable', 'integer'],
            'author_id' => ['nullable', 'integer'],
            'tags_id' => ['nullable', 'integer'],
            

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'title' => ['sometimes', 'string'],
            'location' => ['nullable', 'string'],
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

        if (isset($sanitized['publish_now']) && $sanitized['publish_now'] === true) {
            $sanitized['published_at'] = Carbon::now();
        }

        if (isset($sanitized['unpublish_now']) && $sanitized['unpublish_now'] === true) {
            $sanitized['published_at'] = null;
        }

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
