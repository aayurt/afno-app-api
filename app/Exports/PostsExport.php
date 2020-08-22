<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Post::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.post.columns.id'),
            trans('admin.post.columns.title'),
            trans('admin.post.columns.location'),
            trans('admin.post.columns.body'),
            trans('admin.post.columns.published_at'),
            trans('admin.post.columns.enabled'),
            trans('admin.post.columns.popularity'),
            trans('admin.post.columns.category_id'),
            trans('admin.post.columns.author_id'),
            trans('admin.post.columns.tags_id'),
        ];
    }

    /**
     * @param Post $post
     * @return array
     *
     */
    public function map($post): array
    {
        return [
            $post->id,
            $post->title,
            $post->location,
            $post->body,
            $post->published_at,
            $post->enabled,
            $post->popularity,
            $post->category_id,
            $post->author_id,
            $post->tags_id,
        ];
    }
}
