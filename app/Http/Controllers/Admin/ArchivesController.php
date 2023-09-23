<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ArchivesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Archive\BulkDestroyArchive;
use App\Http\Requests\Admin\Archive\DestroyArchive;
use App\Http\Requests\Admin\Archive\IndexArchive;
use App\Http\Requests\Admin\Archive\StoreArchive;
use App\Http\Requests\Admin\Archive\UpdateArchive;
use App\Models\Archive;
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

class ArchivesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexArchive $request
     * @return array|Factory|View
     */
    public function index(IndexArchive $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Archive::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'archive_subcategory_id', 'enabled', 'public'],

            // set columns to searchIn
            ['id', 'title', 'body'],
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.archive.index', [
            'data' => $data,
            'archiveSubcategories' => ArchiveSubcategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.archive.create');

        return view('admin.archive.create', [
            'archiveSubcategories' => ArchiveSubcategory::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArchive $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreArchive $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Archive
        $archive = Archive::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/archives'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/archives');
    }

    /**
     * Display the specified resource.
     *
     * @param Archive $archive
     * @throws AuthorizationException
     * @return void
     */
    public function show(Archive $archive)
    {
        $this->authorize('admin.archive.show', $archive);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Archive $archive
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Archive $archive)
    {
        $this->authorize('admin.archive.edit', $archive);


        return view('admin.archive.edit', [
            'archive' => $archive,
            'archiveSubcategories' => ArchiveSubcategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArchive $request
     * @param Archive $archive
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateArchive $request, Archive $archive)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Archive
        $archive->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/archives'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/archives');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyArchive $request
     * @param Archive $archive
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyArchive $request, Archive $archive)
    {
        $archive->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyArchive $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyArchive $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Archive::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(ArchivesExport::class), 'archives.xlsx');
    }
}