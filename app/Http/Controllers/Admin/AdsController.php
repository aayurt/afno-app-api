<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ad\BulkDestroyAd;
use App\Http\Requests\Admin\Ad\DestroyAd;
use App\Http\Requests\Admin\Ad\IndexAd;
use App\Http\Requests\Admin\Ad\StoreAd;
use App\Http\Requests\Admin\Ad\UpdateAd;
use App\Models\Ad;
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

class AdsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAd $request
     * @return array|Factory|View
     */
    public function index(IndexAd $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ad::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'page', 'direction'],

            // set columns to searchIn
            ['id', 'page', 'direction']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ad.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ad.create');

        return view('admin.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAd $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAd $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Ad
        $ad = Ad::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ads'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ads');
    }

    /**
     * Display the specified resource.
     *
     * @param Ad $ad
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ad $ad)
    {
        $this->authorize('admin.ad.show', $ad);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ad $ad
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ad $ad)
    {
        $this->authorize('admin.ad.edit', $ad);


        return view('admin.ad.edit', [
            'ad' => $ad,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAd $request
     * @param Ad $ad
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAd $request, Ad $ad)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Ad
        $ad->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ads'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAd $request
     * @param Ad $ad
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAd $request, Ad $ad)
    {
        $ad->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAd $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAd $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Ad::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
      public function ads($page,$direction)
    {
            $ad_contents = Ad::with(['media'])
            ->where(
                "page",
               $page
            )
            ->where(
                "direction",
               $direction
            )
            ->get();
     
         $images = [];
        
        foreach ($ad_contents as $ad_image) {
               array_push($images,["img"=>"media/".$ad_image->media[0]->id."/".$ad_image->media[0]->file_name]);
        }
        
    
        return response()->json([
            'response' => "success", 'ad_image' => $images,
        ]);
       
        
    }
}
