<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentType\BulkDestroyStudentType;
use App\Http\Requests\Admin\StudentType\DestroyStudentType;
use App\Http\Requests\Admin\StudentType\IndexStudentType;
use App\Http\Requests\Admin\StudentType\StoreStudentType;
use App\Http\Requests\Admin\StudentType\UpdateStudentType;
use App\Models\StudentType;
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

class StudentTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStudentType $request
     * @return array|Factory|View
     */
    public function index(IndexStudentType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StudentType::class)->processRequestAndGet(
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

        return view('admin.student-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.student-type.create');

        return view('admin.student-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStudentType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the StudentType
        $studentType = StudentType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-types');
    }

    /**
     * Display the specified resource.
     *
     * @param StudentType $studentType
     * @throws AuthorizationException
     * @return void
     */
    public function show(StudentType $studentType)
    {
        $this->authorize('admin.student-type.show', $studentType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StudentType $studentType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(StudentType $studentType)
    {
        $this->authorize('admin.student-type.edit', $studentType);


        return view('admin.student-type.edit', [
            'studentType' => $studentType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentType $request
     * @param StudentType $studentType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStudentType $request, StudentType $studentType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values StudentType
        $studentType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/student-types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/student-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStudentType $request
     * @param StudentType $studentType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStudentType $request, StudentType $studentType)
    {
        $studentType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStudentType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStudentType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    StudentType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
