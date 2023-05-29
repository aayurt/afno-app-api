<?php

namespace App\Http\Requests\Admin\Post;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePost extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.post.create');
    }

    /**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array
    {
        return [
            'published_at' => ['nullable', 'date'],
            'enabled' => ['required', 'boolean'],
            'popularity' => ['required', 'integer'],
            'category_id' => ['nullable', 'integer'],
            'author_id' => ['nullable', 'integer'],
            'tags' => ['required'],
            // 'author' => ['required'],
            // 'category' => ['required'],
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
            'sub_title' => ['nullable', 'string'],
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

        //Add your code for manipulation with request data here

        return $sanitized;
    }
    public function getTags(): array
    {
        if ($this->has('tags')) {
            $tags = $this->get('tags');
            return array_column($tags, 'id');
        }
        return [];
    }
    public function getAuthorId()
    {
        if ($this->has('author')) {
            return $this->get('author')['id'];
        }
        return null;
    }
    public function getCategoryId()
    {
        if ($this->has('category')) {
            return $this->get('category')['id'];
        }
        return null;
    }
}
