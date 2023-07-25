<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BoardMember\BulkDestroyBoardMember;
use App\Http\Requests\Admin\BoardMember\DestroyBoardMember;
use App\Http\Requests\Admin\BoardMember\IndexBoardMember;
use App\Http\Requests\Admin\BoardMember\StoreBoardMember;
use App\Http\Requests\Admin\BoardMember\UpdateBoardMember;
use App\Models\BoardMember;
use App\Models\Member;
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

class BoardMembersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBoardMember $request
     * @return array|Factory|View
     */
    public function index(IndexBoardMember $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(BoardMember::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'designation', 'member_id'],

            // set columns to searchIn
            ['id', 'designation']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.board-member.index', [
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
        $this->authorize('admin.board-member.create');

        return view('admin.board-member.create', [
            'members' => Member::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBoardMember $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBoardMember $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the BoardMember
        $boardMember = BoardMember::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/board-members'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/board-members');
    }

    /**
     * Display the specified resource.
     *
     * @param BoardMember $boardMember
     * @throws AuthorizationException
     * @return void
     */
    public function show(BoardMember $boardMember)
    {
        $this->authorize('admin.board-member.show', $boardMember);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BoardMember $boardMember
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(BoardMember $boardMember)
    {
        $this->authorize('admin.board-member.edit', $boardMember);


        return view('admin.board-member.edit', [
            'boardMember' => $boardMember,
            'members' => Member::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBoardMember $request
     * @param BoardMember $boardMember
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBoardMember $request, BoardMember $boardMember)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values BoardMember
        $boardMember->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/board-members'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/board-members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBoardMember $request
     * @param BoardMember $boardMember
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBoardMember $request, BoardMember $boardMember)
    {
        $boardMember->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBoardMember $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBoardMember $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    BoardMember::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}