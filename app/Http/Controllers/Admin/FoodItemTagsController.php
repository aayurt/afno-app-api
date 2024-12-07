<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FoodItemTagsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FoodItemTag\BulkDestroyFoodItemTag;
use App\Http\Requests\Admin\FoodItemTag\DestroyFoodItemTag;
use App\Http\Requests\Admin\FoodItemTag\IndexFoodItemTag;
use App\Http\Requests\Admin\FoodItemTag\StoreFoodItemTag;
use App\Http\Requests\Admin\FoodItemTag\UpdateFoodItemTag;
use App\Imports\FoodItemTagImport;
use App\Models\FoodItemTag;
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
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\View\View;

class FoodItemTagsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFoodItemTag $request
     * @return array|Factory|View
     */
    public function index(IndexFoodItemTag $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(FoodItemTag::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'tag', 'count'],

            // set columns to searchIn
            ['id', 'tag']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.food-item-tag.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.food-item-tag.create');

        return view('admin.food-item-tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFoodItemTag $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFoodItemTag $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the FoodItemTag
        $foodItemTag = FoodItemTag::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/food-item-tags'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/food-item-tags');
    }

    /**
     * Display the specified resource.
     *
     * @param FoodItemTag $foodItemTag
     * @throws AuthorizationException
     * @return void
     */
    public function show(FoodItemTag $foodItemTag)
    {
        $this->authorize('admin.food-item-tag.show', $foodItemTag);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FoodItemTag $foodItemTag
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(FoodItemTag $foodItemTag)
    {
        $this->authorize('admin.food-item-tag.edit', $foodItemTag);


        return view('admin.food-item-tag.edit', [
            'foodItemTag' => $foodItemTag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFoodItemTag $request
     * @param FoodItemTag $foodItemTag
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFoodItemTag $request, FoodItemTag $foodItemTag)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values FoodItemTag
        $foodItemTag->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/food-item-tags'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/food-item-tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFoodItemTag $request
     * @param FoodItemTag $foodItemTag
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFoodItemTag $request, FoodItemTag $foodItemTag)
    {
        $foodItemTag->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFoodItemTag $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFoodItemTag $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    FoodItemTag::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app(FoodItemTagsExport::class), 'foodItemTags.xlsx');
    }

    public function import(Request $request)
    {

        $file = $request->file('file');

        Excel::import(new FoodItemTagImport, $file);

        return redirect()->back()->with('success', 'Attendance imported successfully.');
    }

    public function getLatestTags()
    {
        $tags = FoodItemTag::orderBy('updated_at', 'desc')->get();
        return response(['tags' => $tags]);
    }
}
