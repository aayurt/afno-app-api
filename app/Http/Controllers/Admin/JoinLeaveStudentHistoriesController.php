<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JoinLeaveStudentHistory\BulkDestroyJoinLeaveStudentHistory;
use App\Http\Requests\Admin\JoinLeaveStudentHistory\DestroyJoinLeaveStudentHistory;
use App\Http\Requests\Admin\JoinLeaveStudentHistory\IndexJoinLeaveStudentHistory;
use App\Http\Requests\Admin\JoinLeaveStudentHistory\StoreJoinLeaveStudentHistory;
use App\Http\Requests\Admin\JoinLeaveStudentHistory\UpdateJoinLeaveStudentHistory;
use App\Models\JoinLeaveStudentHistory;
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

class JoinLeaveStudentHistoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexJoinLeaveStudentHistory $request
     * @return array|Factory|View
     */
    public function index(IndexJoinLeaveStudentHistory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(JoinLeaveStudentHistory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'status', 'joining_date', 'leaving_date', 'student_id'],

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

        return view('admin.join-leave-student-history.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.join-leave-student-history.create');

        return view('admin.join-leave-student-history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJoinLeaveStudentHistory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreJoinLeaveStudentHistory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the JoinLeaveStudentHistory
        $joinLeaveStudentHistory = JoinLeaveStudentHistory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/join-leave-student-histories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/join-leave-student-histories');
    }

    /**
     * Display the specified resource.
     *
     * @param JoinLeaveStudentHistory $joinLeaveStudentHistory
     * @throws AuthorizationException
     * @return void
     */
    public function show(JoinLeaveStudentHistory $joinLeaveStudentHistory)
    {
        $this->authorize('admin.join-leave-student-history.show', $joinLeaveStudentHistory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param JoinLeaveStudentHistory $joinLeaveStudentHistory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(JoinLeaveStudentHistory $joinLeaveStudentHistory)
    {
        $this->authorize('admin.join-leave-student-history.edit', $joinLeaveStudentHistory);


        return view('admin.join-leave-student-history.edit', [
            'joinLeaveStudentHistory' => $joinLeaveStudentHistory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJoinLeaveStudentHistory $request
     * @param JoinLeaveStudentHistory $joinLeaveStudentHistory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateJoinLeaveStudentHistory $request, JoinLeaveStudentHistory $joinLeaveStudentHistory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values JoinLeaveStudentHistory
        $joinLeaveStudentHistory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/join-leave-student-histories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/join-leave-student-histories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyJoinLeaveStudentHistory $request
     * @param JoinLeaveStudentHistory $joinLeaveStudentHistory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyJoinLeaveStudentHistory $request, JoinLeaveStudentHistory $joinLeaveStudentHistory)
    {
        $joinLeaveStudentHistory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyJoinLeaveStudentHistory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyJoinLeaveStudentHistory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    JoinLeaveStudentHistory::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
