<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Restaurant\BulkDestroyRestaurant;
use App\Http\Requests\Admin\Restaurant\DestroyRestaurant;
use App\Http\Requests\Admin\Restaurant\IndexRestaurant;
use App\Http\Requests\Admin\Restaurant\StoreRestaurant;
use App\Http\Requests\Admin\Restaurant\UpdateRestaurant;
use App\Models\Restaurant;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Request;

class RestaurantsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRestaurant $request
     * @return array|Factory|View
     */
    public function index(IndexRestaurant $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Restaurant::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id','title','location', 'enabled', 'phone_number', 'alternate_phone_number', 'link', 'email', 'instagram', 'facebook', 'youtube', 'latitude', 'longitude', 'monday_open_time', 'monday_close_time', 'tuesday_open_time', 'tuesday_close_time', 'wednesday_open_time', 'wednesday_close_time', 'thursday_open_time', 'thursday_close_time', 'friday_open_time', 'friday_close_time', 'saturday_open_time', 'saturday_close_time', 'sunday_open_time', 'sunday_close_time'],

            // set columns to searchIn
            ['id','title','location', 'sub_title', 'description', 'phone_number', 'alternate_phone_number', 'link', 'email', 'instagram', 'facebook', 'youtube']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.restaurant.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.restaurant.create');

        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRestaurant $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRestaurant $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Restaurant
        $restaurant = Restaurant::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/restaurants'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/restaurants');
    }

    /**
     * Display the specified resource.
     *
     * @param Restaurant $restaurant
     * @throws AuthorizationException
     * @return void
     */
    public function show(Restaurant $restaurant)
    {
        $this->authorize('admin.restaurant.show', $restaurant);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Restaurant $restaurant
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Restaurant $restaurant)
    {
        $this->authorize('admin.restaurant.edit', $restaurant);


        return view('admin.restaurant.edit', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRestaurant $request
     * @param Restaurant $restaurant
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRestaurant $request, Restaurant $restaurant)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Restaurant
        $restaurant->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/restaurants'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/restaurants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRestaurant $request
     * @param Restaurant $restaurant
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRestaurant $request, Restaurant $restaurant)
    {
        $restaurant->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRestaurant $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRestaurant $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Restaurant::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function latestRestaurants($lang, Request $request)
    {
        // App::setLocale($lang);
        $mytime = Carbon::now();
        $restaurants = Restaurant::with((['media']))->where(
            "enabled",
            "=",
            1
        )
            ->orderBy('updated_at', 'DESC')
            ->get();


        return response()->json([
            'response' => "success",
            'data' => $restaurants,
        ]);
    }

    public function singleRestaurant($id, $lang, Request $request)
    {
        $restaurant = Restaurant::with((['media']))

            ->orderBy('updated_at', 'DESC')
            ->find($id);


        return response()->json([
            'response' => "success",
            'data' => $restaurant,
        ]);
    }
}
