<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Member\BulkDestroyMember;
use App\Http\Requests\Admin\Member\DestroyMember;
use App\Http\Requests\Admin\Member\IndexMember;
use App\Http\Requests\Admin\Member\StoreMember;
use App\Http\Requests\Admin\Member\UpdateMember;
use App\Models\Member;
use App\Models\MemberCategory;
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

class MembersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMember $request
     * @return array|Factory|View
     */
    public function index(IndexMember $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Member::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'enabled', 'member_category_id', 'msg', 'name', 'ordination_name', 'address', 'dob', 'gender', 'email', 'phone_no', 'member_category_id'],

            // set columns to searchIn
            ['id', 'title', 'short_description', 'description', 'msg', 'name', 'ordination_name', 'address', 'gender', 'email', 'phone_no', 'member_category_id'],
            function ($query) use ($request) {
                $query->with(['memberCategories']);

                if ($request->has('memberCategories')) {
                    $query->whereIn('category_id', $request->get('memberCategories'));
                }
            },
            null,
            ['orderBy' => 'id', 'orderDirection' => 'desc']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.member.index', [
            'data' => $data,
            'memberCategories' => MemberCategory::all()
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
        $this->authorize('admin.member.create');

        return view('admin.member.create', [
            'memberCategories' => MemberCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMember $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMember $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Member
        $member = Member::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/members'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param Member $member
     * @throws AuthorizationException
     * @return void
     */
    public function show(Member $member)
    {
        $this->authorize('admin.member.show', $member);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Member $member
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Member $member)
    {
        $this->authorize('admin.member.edit', $member);


        return view('admin.member.edit', [
            'member' => $member,
            'memberCategories' => MemberCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMember $request
     * @param Member $member
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMember $request, Member $member)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Member
        $member->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/members'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMember $request
     * @param Member $member
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMember $request, Member $member)
    {
        $member->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMember $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMember $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Member::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}