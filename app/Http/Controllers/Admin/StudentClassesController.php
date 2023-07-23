<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentClass\BulkDestroyStudentClass;
use App\Http\Requests\Admin\StudentClass\DestroyStudentClass;
use App\Http\Requests\Admin\StudentClass\IndexStudentClass;
use App\Http\Requests\Admin\StudentClass\StoreStudentClass;
use App\Http\Requests\Admin\StudentClass\UpdateStudentClass;
use App\Models\StudentClass;
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

class StudentClassesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStudentClass $request
     * @return array|Factory|View
     */
    public function index(IndexStudentClass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StudentClass::class)->processRequestAndGet(
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

        return view('admin.student-class.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.student-class.create');

        return view('admin.student-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentClass $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStudentClass $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the StudentClass
        $studentClass = StudentClass::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-classes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-classes');
    }

    /**
     * Display the specified resource.
     *
     * @param StudentClass $studentClass
     * @throws AuthorizationException
     * @return void
     */
    public function show(StudentClass $studentClass)
    {
        $this->authorize('admin.student-class.show', $studentClass);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StudentClass $studentClass
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(StudentClass $studentClass)
    {
        $this->authorize('admin.student-class.edit', $studentClass);


        return view('admin.student-class.edit', [
            'studentClass' => $studentClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentClass $request
     * @param StudentClass $studentClass
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStudentClass $request, StudentClass $studentClass)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values StudentClass
        $studentClass->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/student-classes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/student-classes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStudentClass $request
     * @param StudentClass $studentClass
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStudentClass $request, StudentClass $studentClass)
    {
        $studentClass->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStudentClass $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStudentClass $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    StudentClass::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
