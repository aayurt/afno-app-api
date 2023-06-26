<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberCategory\BulkDestroyMemberCategory;
use App\Http\Requests\Admin\MemberCategory\DestroyMemberCategory;
use App\Http\Requests\Admin\MemberCategory\IndexMemberCategory;
use App\Http\Requests\Admin\MemberCategory\StoreMemberCategory;
use App\Http\Requests\Admin\MemberCategory\UpdateMemberCategory;
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
use Carbon\Carbon;
use App;

class MemberCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMemberCategory $request
     * @return array|Factory|View
     */
    public function index(IndexMemberCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MemberCategory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title'],

            // set columns to searchIn
            ['id', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.member-category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.member-category.create');

        return view('admin.member-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMemberCategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMemberCategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MemberCategory
        $memberCategory = MemberCategory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/member-categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/member-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param MemberCategory $memberCategory
     * @throws AuthorizationException
     * @return void
     */
    public function show(MemberCategory $memberCategory)
    {
        $this->authorize('admin.member-category.show', $memberCategory);

        // TODO your code goes here
    }
    public function showMemberCategory($lang)
    {
        App::setLocale($lang);
        $category = MemberCategory::all();
        return response()->json(['response' => "success", 'category_list' => $category]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param MemberCategory $memberCategory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MemberCategory $memberCategory)
    {
        $this->authorize('admin.member-category.edit', $memberCategory);


        return view('admin.member-category.edit', [
            'memberCategory' => $memberCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMemberCategory $request
     * @param MemberCategory $memberCategory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMemberCategory $request, MemberCategory $memberCategory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MemberCategory
        $memberCategory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/member-categories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/member-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMemberCategory $request
     * @param MemberCategory $memberCategory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMemberCategory $request, MemberCategory $memberCategory)
    {
        $memberCategory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMemberCategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMemberCategory $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MemberCategory::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}