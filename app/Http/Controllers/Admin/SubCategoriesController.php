<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubCategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\BulkDestroySubCategory;
use App\Http\Requests\Admin\SubCategory\DestroySubCategory;
use App\Http\Requests\Admin\SubCategory\IndexSubCategory;
use App\Http\Requests\Admin\SubCategory\StoreSubCategory;
use App\Http\Requests\Admin\SubCategory\UpdateSubCategory;
use App\Models\SubCategory;
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

class SubCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSubCategory $request
     * @return array|Factory|View
     */
    public function index(IndexSubCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SubCategory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'sub_title', 'description', 'category_id'],

            // set columns to searchIn
            ['id', 'sub_title', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.sub-category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sub-category.create');

        return view('admin.sub-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubCategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSubCategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SubCategory
        $subCategory = SubCategory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sub-categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sub-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param SubCategory $subCategory
     * @throws AuthorizationException
     * @return void
     */
    public function show(SubCategory $subCategory)
    {
        $this->authorize('admin.sub-category.show', $subCategory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubCategory $subCategory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SubCategory $subCategory)
    {
        $this->authorize('admin.sub-category.edit', $subCategory);


        return view('admin.sub-category.edit', [
            'subCategory' => $subCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubCategory $request
     * @param SubCategory $subCategory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSubCategory $request, SubCategory $subCategory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SubCategory
        $subCategory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sub-categories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sub-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySubCategory $request
     * @param SubCategory $subCategory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySubCategory $request, SubCategory $subCategory)
    {
        $subCategory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySubCategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySubCategory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SubCategory::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(SubCategoriesExport::class), 'subCategories.xlsx');
    }
}
