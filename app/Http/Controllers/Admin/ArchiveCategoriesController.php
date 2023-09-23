<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ArchiveCategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArchiveCategory\BulkDestroyArchiveCategory;
use App\Http\Requests\Admin\ArchiveCategory\DestroyArchiveCategory;
use App\Http\Requests\Admin\ArchiveCategory\IndexArchiveCategory;
use App\Http\Requests\Admin\ArchiveCategory\StoreArchiveCategory;
use App\Http\Requests\Admin\ArchiveCategory\UpdateArchiveCategory;
use App\Models\ArchiveCategory;
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

class ArchiveCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexArchiveCategory $request
     * @return array|Factory|View
     */
    public function index(IndexArchiveCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ArchiveCategory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title'],

            // set columns to searchIn
            ['id', 'title', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.archive-category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.archive-category.create');

        return view('admin.archive-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArchiveCategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreArchiveCategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ArchiveCategory
        $archiveCategory = ArchiveCategory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/archive-categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/archive-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param ArchiveCategory $archiveCategory
     * @throws AuthorizationException
     * @return void
     */
    public function show(ArchiveCategory $archiveCategory)
    {
        $this->authorize('admin.archive-category.show', $archiveCategory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ArchiveCategory $archiveCategory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ArchiveCategory $archiveCategory)
    {
        $this->authorize('admin.archive-category.edit', $archiveCategory);


        return view('admin.archive-category.edit', [
            'archiveCategory' => $archiveCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArchiveCategory $request
     * @param ArchiveCategory $archiveCategory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateArchiveCategory $request, ArchiveCategory $archiveCategory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ArchiveCategory
        $archiveCategory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/archive-categories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/archive-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyArchiveCategory $request
     * @param ArchiveCategory $archiveCategory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyArchiveCategory $request, ArchiveCategory $archiveCategory)
    {
        $archiveCategory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyArchiveCategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyArchiveCategory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ArchiveCategory::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(ArchiveCategoriesExport::class), 'archiveCategories.xlsx');
    }
}
