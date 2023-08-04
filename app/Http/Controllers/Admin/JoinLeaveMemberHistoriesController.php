<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JoinLeaveMemberHistory\BulkDestroyJoinLeaveMemberHistory;
use App\Http\Requests\Admin\JoinLeaveMemberHistory\DestroyJoinLeaveMemberHistory;
use App\Http\Requests\Admin\JoinLeaveMemberHistory\IndexJoinLeaveMemberHistory;
use App\Http\Requests\Admin\JoinLeaveMemberHistory\StoreJoinLeaveMemberHistory;
use App\Http\Requests\Admin\JoinLeaveMemberHistory\UpdateJoinLeaveMemberHistory;
use App\Models\JoinLeaveMemberHistory;
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

class JoinLeaveMemberHistoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexJoinLeaveMemberHistory $request
     * @return array|Factory|View
     */
    public function index(IndexJoinLeaveMemberHistory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(JoinLeaveMemberHistory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'status', 'joining_date', 'leaving_date', 'member_id'],

            // set columns to searchIn
            ['id', 'status']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.join-leave-member-history.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.join-leave-member-history.create');

        return view('admin.join-leave-member-history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJoinLeaveMemberHistory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreJoinLeaveMemberHistory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the JoinLeaveMemberHistory
        $joinLeaveMemberHistory = JoinLeaveMemberHistory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/join-leave-member-histories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/join-leave-member-histories');
    }

    /**
     * Display the specified resource.
     *
     * @param JoinLeaveMemberHistory $joinLeaveMemberHistory
     * @throws AuthorizationException
     * @return void
     */
    public function show(JoinLeaveMemberHistory $joinLeaveMemberHistory)
    {
        $this->authorize('admin.join-leave-member-history.show', $joinLeaveMemberHistory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param JoinLeaveMemberHistory $joinLeaveMemberHistory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(JoinLeaveMemberHistory $joinLeaveMemberHistory)
    {
        $this->authorize('admin.join-leave-member-history.edit', $joinLeaveMemberHistory);


        return view('admin.join-leave-member-history.edit', [
            'joinLeaveMemberHistory' => $joinLeaveMemberHistory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJoinLeaveMemberHistory $request
     * @param JoinLeaveMemberHistory $joinLeaveMemberHistory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateJoinLeaveMemberHistory $request, JoinLeaveMemberHistory $joinLeaveMemberHistory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values JoinLeaveMemberHistory
        $joinLeaveMemberHistory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/join-leave-member-histories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/join-leave-member-histories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyJoinLeaveMemberHistory $request
     * @param JoinLeaveMemberHistory $joinLeaveMemberHistory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyJoinLeaveMemberHistory $request, JoinLeaveMemberHistory $joinLeaveMemberHistory)
    {
        $joinLeaveMemberHistory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyJoinLeaveMemberHistory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyJoinLeaveMemberHistory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    JoinLeaveMemberHistory::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
