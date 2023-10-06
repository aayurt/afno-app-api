<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubActivity\BulkDestroySubActivity;
use App\Http\Requests\Admin\SubActivity\DestroySubActivity;
use App\Http\Requests\Admin\SubActivity\IndexSubActivity;
use App\Http\Requests\Admin\SubActivity\StoreSubActivity;
use App\Http\Requests\Admin\SubActivity\UpdateSubActivity;
use App\Models\Activity;
use App\Models\SubActivity;
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

class SubActivitiesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSubActivity $request
     * @return array|Factory|View
     */
    public function index(IndexSubActivity $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SubActivity::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'activity_id', 'title', 'subtitle', 'link', 'enabled'],

            // set columns to searchIn
            ['id', 'title', 'subtitle', 'body', 'link']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.sub-activity.index', ['data' => $data,            'activities' => Activity::all(),
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
        $this->authorize('admin.sub-activity.create');

        return view('admin.sub-activity.create',['activities' => Activity::all(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubActivity $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSubActivity $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SubActivity
        $subActivity = SubActivity::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sub-activities'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sub-activities');
    }

    /**
     * Display the specified resource.
     *
     * @param SubActivity $subActivity
     * @throws AuthorizationException
     * @return void
     */
    public function show(SubActivity $subActivity)
    {
        $this->authorize('admin.sub-activity.show', $subActivity);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubActivity $subActivity
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SubActivity $subActivity)
    {
        $this->authorize('admin.sub-activity.edit', $subActivity);


        return view('admin.sub-activity.edit', [
            'subActivity' => $subActivity,
            'activities' => Activity::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubActivity $request
     * @param SubActivity $subActivity
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSubActivity $request, SubActivity $subActivity)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SubActivity
        $subActivity->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sub-activities'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sub-activities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySubActivity $request
     * @param SubActivity $subActivity
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySubActivity $request, SubActivity $subActivity)
    {
        $subActivity->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySubActivity $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySubActivity $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SubActivity::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
