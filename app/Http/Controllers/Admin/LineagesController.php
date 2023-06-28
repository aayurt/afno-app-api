<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lineage\BulkDestroyLineage;
use App\Http\Requests\Admin\Lineage\DestroyLineage;
use App\Http\Requests\Admin\Lineage\IndexLineage;
use App\Http\Requests\Admin\Lineage\StoreLineage;
use App\Http\Requests\Admin\Lineage\UpdateLineage;
use App\Models\Lineage;
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
use App;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LineagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLineage $request
     * @return array|Factory|View
     */
    public function index(IndexLineage $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Lineage::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'enabled'],

            // set columns to searchIn
            ['id', 'title', 'short_description', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.lineage.index', ['data' => $data]);
    }
    public function showPostLineage(Request $request)
    {
        $targetDate = $request->input('updated_at');
        $lang = $request->input('lang');
        App::setLocale($lang);
        $post = Lineage::with(['media'])->select(
            'id',
            'title',
            'short_description',
            'description',
            'enabled',
            "created_at",
            "updated_at",
        )
            ->where('updated_at', '>=', $targetDate)
            ->take(10)->get();
        return response()->json(['response' => "success", 'post_list' => $post]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.lineage.create');

        return view('admin.lineage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLineage $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLineage $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Lineage
        $lineage = Lineage::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/lineages'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/lineages');
    }

    /**
     * Display the specified resource.
     *
     * @param Lineage $lineage
     * @throws AuthorizationException
     * @return void
     */
    public function show(Lineage $lineage)
    {
        $this->authorize('admin.lineage.show', $lineage);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lineage $lineage
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Lineage $lineage)
    {
        $this->authorize('admin.lineage.edit', $lineage);


        return view('admin.lineage.edit', [
            'lineage' => $lineage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLineage $request
     * @param Lineage $lineage
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLineage $request, Lineage $lineage)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Lineage
        $lineage->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/lineages'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/lineages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLineage $request
     * @param Lineage $lineage
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLineage $request, Lineage $lineage)
    {
        $lineage->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLineage $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLineage $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Lineage::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}