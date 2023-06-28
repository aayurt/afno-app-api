<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AffiliatedGroup\BulkDestroyAffiliatedGroup;
use App\Http\Requests\Admin\AffiliatedGroup\DestroyAffiliatedGroup;
use App\Http\Requests\Admin\AffiliatedGroup\IndexAffiliatedGroup;
use App\Http\Requests\Admin\AffiliatedGroup\StoreAffiliatedGroup;
use App\Http\Requests\Admin\AffiliatedGroup\UpdateAffiliatedGroup;
use App\Models\AffiliatedCategory;
use App\Models\AffiliatedGroup;
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
use Illuminate\Http\Request;
use App;
use Carbon\Carbon;

class AffiliatedGroupsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAffiliatedGroup $request
     * @return array|Factory|View
     */
    public function index(IndexAffiliatedGroup $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AffiliatedGroup::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'enabled', 'affiliated_group_category_id'],

            // set columns to searchIn
            ['id', 'title', 'short_description', 'description'],
            function ($query) use ($request) {
                $query->with(['affiliatedCategories']);

                if ($request->has('affiliatedCategories')) {
                    $query->whereIn('affiliated_group_category_id', $request->get('affiliatedCategories'));
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

        return view('admin.affiliated-group.index', ['data' => $data, 'affiliatedCategories' => AffiliatedCategory::all()]);
    }

    public function showPostAffiliatedGroups(Request $request)
    {
        $targetDate = $request->input('updated_at');
        $lang = $request->input('lang');
        App::setLocale($lang);
        $post = AffiliatedGroup::with(['affiliatedCategories', 'media'])->select(
            'id',
            'title',
            'short_description',
            'description',
            'enabled',
            'affiliated_group_category_id',
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
        $this->authorize('admin.affiliated-group.create');

        return view(
            'admin.affiliated-group.create',
            ['affiliatedCategories' => AffiliatedCategory::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAffiliatedGroup $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAffiliatedGroup $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AffiliatedGroup
        $affiliatedGroup = AffiliatedGroup::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/affiliated-groups'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/affiliated-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param AffiliatedGroup $affiliatedGroup
     * @throws AuthorizationException
     * @return void
     */
    public function show(AffiliatedGroup $affiliatedGroup)
    {
        $this->authorize('admin.affiliated-group.show', $affiliatedGroup);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AffiliatedGroup $affiliatedGroup
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AffiliatedGroup $affiliatedGroup)
    {
        $this->authorize('admin.affiliated-group.edit', $affiliatedGroup);


        return view('admin.affiliated-group.edit', [
            'affiliatedGroup' => $affiliatedGroup,
            'affiliatedCategories' => AffiliatedCategory::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAffiliatedGroup $request
     * @param AffiliatedGroup $affiliatedGroup
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAffiliatedGroup $request, AffiliatedGroup $affiliatedGroup)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AffiliatedGroup
        $affiliatedGroup->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/affiliated-groups'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/affiliated-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAffiliatedGroup $request
     * @param AffiliatedGroup $affiliatedGroup
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAffiliatedGroup $request, AffiliatedGroup $affiliatedGroup)
    {
        $affiliatedGroup->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAffiliatedGroup $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAffiliatedGroup $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AffiliatedGroup::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}