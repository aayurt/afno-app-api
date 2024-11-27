<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FoodItem\BulkDestroyFoodItem;
use App\Http\Requests\Admin\FoodItem\DestroyFoodItem;
use App\Http\Requests\Admin\FoodItem\IndexFoodItem;
use App\Http\Requests\Admin\FoodItem\StoreFoodItem;
use App\Http\Requests\Admin\FoodItem\UpdateFoodItem;
use App\Models\FoodItem;
use App\Models\FoodItemTag;
use App\Models\Restaurant;
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

class FoodItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFoodItem $request
     * @return array|Factory|View
     */
    public function index(IndexFoodItem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(FoodItem::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'restaurant_id', 'title', 'type', 'price'],

            // set columns to searchIn
            ['id', 'title', 'type', 'tags'],

            function ($query) use ($request) {
                $query->with(['restaurant']);

                // add this line if you want to search by restaurant attributes
                $query->join('restaurants', 'restaurants.id', '=', 'food_items.restaurant_id');

                if ($request->has('restaurants')) {
                    $query->whereIn('restaurant_id', $request->get('restaurants'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.food-item.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.food-item.create');

        return view('admin.food-item.create', [
            'restaurants' => Restaurant::whereDoesntHave('foodItems')->get(),
            'foodItemtags' => FoodItemTag::all()->map(function ($foodtag) {
                return $foodtag->tag;
            }),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFoodItem $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFoodItem $request)
    {
        $tags = json_encode($request->tags);
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized["tags"] = $tags;

        // Store the FoodItem
        $foodItem = FoodItem::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/food-items'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/food-items');
    }

    /**
     * Display the specified resource.
     *
     * @param FoodItem $foodItem
     * @throws AuthorizationException
     * @return void
     */
    public function show(FoodItem $foodItem)
    {
        $this->authorize('admin.food-item.show', $foodItem);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FoodItem $foodItem
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(FoodItem $foodItem)
    {
        $this->authorize('admin.food-item.edit', $foodItem);
        $tags = json_decode($foodItem->tags, true);
        $foodItem->tags = $tags;

        return view('admin.food-item.edit', [
            'foodItem' => $foodItem,
            'restaurants' => Restaurant::all(),
            'foodItemtags' => FoodItemTag::all()->map(function ($foodtag) {
                return $foodtag->tag;
            }),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFoodItem $request
     * @param FoodItem $foodItem
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFoodItem $request, FoodItem $foodItem)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        // Update changed values FoodItem
        $foodItem->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/food-items'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/food-items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFoodItem $request
     * @param FoodItem $foodItem
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFoodItem $request, FoodItem $foodItem)
    {
        $foodItem->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFoodItem $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFoodItem $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    FoodItem::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
