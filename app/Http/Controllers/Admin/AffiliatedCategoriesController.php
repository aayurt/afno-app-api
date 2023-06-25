<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AffiliatedCategory\BulkDestroyAffiliatedCategory;
use App\Http\Requests\Admin\AffiliatedCategory\DestroyAffiliatedCategory;
use App\Http\Requests\Admin\AffiliatedCategory\IndexAffiliatedCategory;
use App\Http\Requests\Admin\AffiliatedCategory\StoreAffiliatedCategory;
use App\Http\Requests\Admin\AffiliatedCategory\UpdateAffiliatedCategory;
use App\Models\AffiliatedCategory;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AffiliatedCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAffiliatedCategory $request
     * @return array|Factory|View
     */
    public function index(IndexAffiliatedCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AffiliatedCategory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id'],

            // set columns to searchIn
            ['id', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.affiliated-category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.affiliated-category.create');

        return view('admin.affiliated-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAffiliatedCategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAffiliatedCategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AffiliatedCategory
        $affiliatedCategory = AffiliatedCategory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/affiliated-categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/affiliated-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param AffiliatedCategory $affiliatedCategory
     * @throws AuthorizationException
     * @return void
     */
    public function show(AffiliatedCategory $affiliatedCategory)
    {
        $this->authorize('admin.affiliated-category.show', $affiliatedCategory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AffiliatedCategory $affiliatedCategory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AffiliatedCategory $affiliatedCategory)
    {
        $this->authorize('admin.affiliated-category.edit', $affiliatedCategory);


        return view('admin.affiliated-category.edit', [
            'affiliatedCategory' => $affiliatedCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAffiliatedCategory $request
     * @param AffiliatedCategory $affiliatedCategory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAffiliatedCategory $request, AffiliatedCategory $affiliatedCategory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AffiliatedCategory
        $affiliatedCategory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/affiliated-categories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/affiliated-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAffiliatedCategory $request
     * @param AffiliatedCategory $affiliatedCategory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAffiliatedCategory $request, AffiliatedCategory $affiliatedCategory)
    {
        $affiliatedCategory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAffiliatedCategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAffiliatedCategory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AffiliatedCategory::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
