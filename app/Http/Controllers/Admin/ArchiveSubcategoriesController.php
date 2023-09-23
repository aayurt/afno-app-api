<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ArchiveSubcategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArchiveSubcategory\BulkDestroyArchiveSubcategory;
use App\Http\Requests\Admin\ArchiveSubcategory\DestroyArchiveSubcategory;
use App\Http\Requests\Admin\ArchiveSubcategory\IndexArchiveSubcategory;
use App\Http\Requests\Admin\ArchiveSubcategory\StoreArchiveSubcategory;
use App\Http\Requests\Admin\ArchiveSubcategory\UpdateArchiveSubcategory;
use App\Models\ArchiveCategory;
use App\Models\ArchiveSubcategory;
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

class ArchiveSubcategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexArchiveSubcategory $request
     * @return array|Factory|View
     */
    public function index(IndexArchiveSubcategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ArchiveSubcategory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'archive_category_id'],

            // set columns to searchIn
            ['id', 'title', 'description'],
            function ($query) use ($request) {
                $query->with(['archiveCategories']);

                if ($request->has('archiveCategories')) {
                    $query->whereIn('archive_category_id', $request->get('archiveCategories'));
                }
            },
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data, 'archiveCategories' => ArchiveCategory::all()];
        }

        return view('admin.archive-subcategory.index', ['data' => $data, 'archiveCategories' => ArchiveCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.archive-subcategory.create');
        return view('admin.archive-subcategory.create', [
            'archiveCategories' => ArchiveCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArchiveSubcategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreArchiveSubcategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ArchiveSubcategory
        $archiveSubcategory = ArchiveSubcategory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/archive-subcategories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/archive-subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param ArchiveSubcategory $archiveSubcategory
     * @throws AuthorizationException
     * @return void
     */
    public function show(ArchiveSubcategory $archiveSubcategory)
    {
        $this->authorize('admin.archive-subcategory.show', $archiveSubcategory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ArchiveSubcategory $archiveSubcategory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ArchiveSubcategory $archiveSubcategory)
    {
        $this->authorize('admin.archive-subcategory.edit', $archiveSubcategory);


        return view('admin.archive-subcategory.edit', [
            'archiveSubcategory' => $archiveSubcategory,
            'archiveCategories' => ArchiveCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArchiveSubcategory $request
     * @param ArchiveSubcategory $archiveSubcategory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateArchiveSubcategory $request, ArchiveSubcategory $archiveSubcategory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ArchiveSubcategory
        $archiveSubcategory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/archive-subcategories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/archive-subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyArchiveSubcategory $request
     * @param ArchiveSubcategory $archiveSubcategory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyArchiveSubcategory $request, ArchiveSubcategory $archiveSubcategory)
    {
        $archiveSubcategory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyArchiveSubcategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyArchiveSubcategory $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ArchiveSubcategory::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(ArchiveSubcategoriesExport::class), 'archiveSubcategories.xlsx');
    }
}