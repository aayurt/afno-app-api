<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\BulkDestroyCategory;
use App\Http\Requests\Admin\Category\DestroyCategory;
use App\Http\Requests\Admin\Category\IndexCategory;
use App\Http\Requests\Admin\Category\StoreCategory;
use App\Http\Requests\Admin\Category\UpdateCategory;
use App;
use App\Models\Category;
use App\Models\Post;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\View\View;
use Carbon\Carbon;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCategory $request
     * @return array|Factory|View
     */
    public function index(IndexCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Category::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'description'],

            // set columns to searchIn
            ['id', 'title', 'description'],

        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.category.create');

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Category
        $category = Category::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @throws AuthorizationException
     * @return void
     */
    public function show(Category $category)
    {
        $this->authorize('admin.category.show', $category);

        // TODO your code goes here
    }
    public function showCategory($lang)
    {
        App::setLocale($lang);
        $category = Category::all();
        return response()->json(['response' => "success", 'category_list' => $category]);
    }

    public function showCategoryPosts($cid, $lang)
    {
        App::setLocale($lang);
        $mytime = Carbon::now();
        $category = Category::with(['post.tags', 'post.author', 'post.media'])->find($cid);
        $posts = $category->post;
        foreach ($posts as $post) {
            $published_at = $post->published_at;
            $published_at_convert = new Carbon($published_at);
            $diff_in_minutes = $published_at_convert->diffForHumans($mytime);
            $diff_in_days = $published_at_convert->diffInDays($mytime);
            $post->time = $diff_in_minutes;
            if ($diff_in_days > 0) {
                $post->popularitypopularity_compare =  $post->popularity - $diff_in_days;
            } else {
                $post->popularitypopularity_compare = -100;
            }
        }
        // $post_list = $posts->post;
        // $post_list_new = [];
        // foreach ($post_list as $key) {
        //     $a = [
        //         "id" => $$key->id,
        //         "title" => $key->title,
        //         "location" => $key->location,
        //         "body" => $key->body,
        //         "published_at" => $key->published_at,
        //         "popularity" => $key->popularity
        //     ];
        //     array_push($post_list_new, $a);
        // }
        return response()->json(['response' => "success", 'category_post_list' => $category]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        $this->authorize('admin.category.edit', $category);

        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategory $request
     * @param Category $category
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCategory $request, Category $category)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Category
        $category->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/categories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCategory $request
     * @param Category $category
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCategory $request, Category $category)
    {
        $category->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCategory $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Category::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Export entities
     *
     * @return BinaryFileResponse|null
     */
    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app(CategoriesExport::class), 'categories.xlsx');
    }
}
