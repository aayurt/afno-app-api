<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberAttendance\BulkDestroyMemberAttendance;
use App\Http\Requests\Admin\MemberAttendance\DestroyMemberAttendance;
use App\Http\Requests\Admin\MemberAttendance\IndexMemberAttendance;
use App\Http\Requests\Admin\MemberAttendance\StoreMemberAttendance;
use App\Http\Requests\Admin\MemberAttendance\UpdateMemberAttendance;
use App\Imports\ImportMemberAttendance;
use App\Models\Member;
use App\Models\MemberAttendance;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class MemberAttendancesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMemberAttendance $request
     * @return array|Factory|View
     */
    public function index(IndexMemberAttendance $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MemberAttendance::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'date', 'clock_in', 'clock_out', 'early', 'must_cin', 'must_cout', 'att_time', 'member_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        return view('admin.member-attendance.index', [
            'data' => $data,
            'members' => Member::all(),
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
        $this->authorize('admin.member-attendance.create');

        return view('admin.member-attendance.create', [
            'members' => Member::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMemberAttendance $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMemberAttendance $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MemberAttendance
        $memberAttendance = MemberAttendance::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/member-attendances'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/member-attendances');
    }

    /**
     * Display the specified resource.
     *
     * @param MemberAttendance $memberAttendance
     * @throws AuthorizationException
     * @return void
     */
    public function show(MemberAttendance $memberAttendance)
    {
        $this->authorize('admin.member-attendance.show', $memberAttendance);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MemberAttendance $memberAttendance
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MemberAttendance $memberAttendance)
    {
        $this->authorize('admin.member-attendance.edit', $memberAttendance);


        return view('admin.member-attendance.edit', [
            'memberAttendance' => $memberAttendance,
            'members' => Member::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMemberAttendance $request
     * @param MemberAttendance $memberAttendance
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMemberAttendance $request, MemberAttendance $memberAttendance)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MemberAttendance
        $memberAttendance->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/member-attendances'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/member-attendances');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMemberAttendance $request
     * @param MemberAttendance $memberAttendance
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMemberAttendance $request, MemberAttendance $memberAttendance)
    {
        $memberAttendance->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMemberAttendance $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMemberAttendance $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MemberAttendance::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new ImportMemberAttendance, $file);

        return redirect()->back()->with('success', 'Attendance imported successfully.');
    }
}