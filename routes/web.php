<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/admin/login');

});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login', 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('categories')->name('categories/')->group(static function () {
            Route::get('/', 'CategoriesController@index')->name('index');
            Route::get('/create', 'CategoriesController@create')->name('create');
            Route::post('/', 'CategoriesController@store')->name('store');
            Route::get('/{category}/edit', 'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}', 'CategoriesController@update')->name('update');
            Route::delete('/{category}', 'CategoriesController@destroy')->name('destroy');
            Route::get('/export', 'CategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('authors')->name('authors/')->group(static function () {
            Route::get('/', 'AuthorsController@index')->name('index');
            Route::get('/create', 'AuthorsController@create')->name('create');
            Route::post('/', 'AuthorsController@store')->name('store');
            Route::get('/{author}/edit', 'AuthorsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'AuthorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{author}', 'AuthorsController@update')->name('update');
            Route::delete('/{author}', 'AuthorsController@destroy')->name('destroy');
            Route::get('/export', 'AuthorsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('sub-categories')->name('sub-categories/')->group(static function () {
            Route::get('/', 'SubCategoriesController@index')->name('index');
            Route::get('/create', 'SubCategoriesController@create')->name('create');
            Route::post('/', 'SubCategoriesController@store')->name('store');
            Route::get('/{subCategory}/edit', 'SubCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'SubCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{subCategory}', 'SubCategoriesController@update')->name('update');
            Route::delete('/{subCategory}', 'SubCategoriesController@destroy')->name('destroy');
            Route::get('/export', 'SubCategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('posts')->name('posts/')->group(static function () {
            Route::get('/', 'PostsController@index')->name('index');
            Route::get('/create', 'PostsController@create')->name('create');
            Route::post('/', 'PostsController@store')->name('store');
            Route::get('/{post}/edit', 'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}', 'PostsController@update')->name('update');
            Route::delete('/{post}', 'PostsController@destroy')->name('destroy');
            Route::get('/export', 'PostsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('tags')->name('tags/')->group(static function () {
            Route::get('/', 'TagsController@index')->name('index');
            Route::get('/create', 'TagsController@create')->name('create');
            Route::post('/', 'TagsController@store')->name('store');
            Route::get('/{tag}/edit', 'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}', 'TagsController@update')->name('update');
            Route::delete('/{tag}', 'TagsController@destroy')->name('destroy');
            Route::get('/export', 'TagsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login', 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('sub-categories')->name('sub-categories/')->group(static function () {
            Route::get('/', 'SubCategoriesController@index')->name('index');
            Route::get('/create', 'SubCategoriesController@create')->name('create');
            Route::post('/', 'SubCategoriesController@store')->name('store');
            Route::get('/{subCategory}/edit', 'SubCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'SubCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{subCategory}', 'SubCategoriesController@update')->name('update');
            Route::delete('/{subCategory}', 'SubCategoriesController@destroy')->name('destroy');
            Route::get('/export', 'SubCategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('tags')->name('tags/')->group(static function () {
            Route::get('/', 'TagsController@index')->name('index');
            Route::get('/create', 'TagsController@create')->name('create');
            Route::post('/', 'TagsController@store')->name('store');
            Route::get('/{tag}/edit', 'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}', 'TagsController@update')->name('update');
            Route::delete('/{tag}', 'TagsController@destroy')->name('destroy');
            Route::get('/export', 'TagsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('authors')->name('authors/')->group(static function () {
            Route::get('/', 'AuthorsController@index')->name('index');
            Route::get('/create', 'AuthorsController@create')->name('create');
            Route::post('/', 'AuthorsController@store')->name('store');
            Route::get('/{author}/edit', 'AuthorsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'AuthorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{author}', 'AuthorsController@update')->name('update');
            Route::delete('/{author}', 'AuthorsController@destroy')->name('destroy');
            Route::get('/export', 'AuthorsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('categories')->name('categories/')->group(static function () {
            Route::get('/', 'CategoriesController@index')->name('index');
            Route::get('/create', 'CategoriesController@create')->name('create');
            Route::post('/', 'CategoriesController@store')->name('store');
            Route::get('/{category}/edit', 'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}', 'CategoriesController@update')->name('update');
            Route::delete('/{category}', 'CategoriesController@destroy')->name('destroy');
            Route::get('/export', 'CategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('posts')->name('posts/')->group(static function () {
            Route::get('/', 'PostsController@index')->name('index');
            Route::get('/create', 'PostsController@create')->name('create');
            Route::post('/', 'PostsController@store')->name('store');
            Route::get('/{post}/edit', 'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}', 'PostsController@update')->name('update');
            Route::delete('/{post}', 'PostsController@destroy')->name('destroy');
            Route::get('/export', 'PostsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('ads')->name('ads/')->group(static function () {
            Route::get('/', 'AdsController@index')->name('index');
            Route::get('/create', 'AdsController@create')->name('create');
            Route::post('/', 'AdsController@store')->name('store');
            Route::get('/{ad}/edit', 'AdsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'AdsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ad}', 'AdsController@update')->name('update');
            Route::delete('/{ad}', 'AdsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('posts')->name('posts/')->group(static function () {
            Route::get('/', 'PostsController@index')->name('index');
            Route::get('/create', 'PostsController@create')->name('create');
            Route::post('/', 'PostsController@store')->name('store');
            Route::get('/{post}/edit', 'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}', 'PostsController@update')->name('update');
            Route::delete('/{post}', 'PostsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('tags')->name('tags/')->group(static function () {
            Route::get('/', 'TagsController@index')->name('index');
            Route::get('/create', 'TagsController@create')->name('create');
            Route::post('/', 'TagsController@store')->name('store');
            Route::get('/{tag}/edit', 'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}', 'TagsController@update')->name('update');
            Route::delete('/{tag}', 'TagsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('categories')->name('categories/')->group(static function () {
            Route::get('/', 'CategoriesController@index')->name('index');
            Route::get('/create', 'CategoriesController@create')->name('create');
            Route::post('/', 'CategoriesController@store')->name('store');
            Route::get('/{category}/edit', 'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}', 'CategoriesController@update')->name('update');
            Route::delete('/{category}', 'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('authors')->name('authors/')->group(static function () {
            Route::get('/', 'AuthorsController@index')->name('index');
            Route::get('/create', 'AuthorsController@create')->name('create');
            Route::post('/', 'AuthorsController@store')->name('store');
            Route::get('/{author}/edit', 'AuthorsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'AuthorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{author}', 'AuthorsController@update')->name('update');
            Route::delete('/{author}', 'AuthorsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('roles')->name('roles/')->group(static function () {
            Route::get('/', 'RolesController@index')->name('index');
            Route::get('/create', 'RolesController@create')->name('create');
            Route::post('/', 'RolesController@store')->name('store');
            Route::get('/{role}/edit', 'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}', 'RolesController@update')->name('update');
            Route::delete('/{role}', 'RolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('members')->name('members/')->group(static function () {
            Route::get('/', 'MembersController@index')->name('index');
            Route::get('/create', 'MembersController@create')->name('create');
            Route::post('/', 'MembersController@store')->name('store');
            Route::get('/{member}/edit', 'MembersController@edit')->name('edit');
            Route::post('/bulk-destroy', 'MembersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{member}', 'MembersController@update')->name('update');
            Route::delete('/{member}', 'MembersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('lineages')->name('lineages/')->group(static function () {
            Route::get('/', 'LineagesController@index')->name('index');
            Route::get('/create', 'LineagesController@create')->name('create');
            Route::post('/', 'LineagesController@store')->name('store');
            Route::get('/{lineage}/edit', 'LineagesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'LineagesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lineage}', 'LineagesController@update')->name('update');
            Route::delete('/{lineage}', 'LineagesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('member-categories')->name('member-categories/')->group(static function () {
            Route::get('/', 'MemberCategoriesController@index')->name('index');
            Route::get('/create', 'MemberCategoriesController@create')->name('create');
            Route::post('/', 'MemberCategoriesController@store')->name('store');
            Route::get('/{memberCategory}/edit', 'MemberCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'MemberCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{memberCategory}', 'MemberCategoriesController@update')->name('update');
            Route::delete('/{memberCategory}', 'MemberCategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('affiliated-groups')->name('affiliated-groups/')->group(static function () {
            Route::get('/', 'AffiliatedGroupsController@index')->name('index');
            Route::get('/create', 'AffiliatedGroupsController@create')->name('create');
            Route::post('/', 'AffiliatedGroupsController@store')->name('store');
            Route::get('/{affiliatedGroup}/edit', 'AffiliatedGroupsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'AffiliatedGroupsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{affiliatedGroup}', 'AffiliatedGroupsController@update')->name('update');
            Route::delete('/{affiliatedGroup}', 'AffiliatedGroupsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('affiliated-categories')->name('affiliated-categories/')->group(static function () {
            Route::get('/', 'AffiliatedCategoriesController@index')->name('index');
            Route::get('/create', 'AffiliatedCategoriesController@create')->name('create');
            Route::post('/', 'AffiliatedCategoriesController@store')->name('store');
            Route::get('/{affiliatedCategory}/edit', 'AffiliatedCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'AffiliatedCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{affiliatedCategory}', 'AffiliatedCategoriesController@update')->name('update');
            Route::delete('/{affiliatedCategory}', 'AffiliatedCategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('students')->name('students/')->group(static function () {
            Route::get('/', 'StudentsController@index')->name('index');
            Route::get('/create', 'StudentsController@create')->name('create');
            Route::post('/', 'StudentsController@store')->name('store');
            Route::get('/{student}/edit', 'StudentsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'StudentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{student}', 'StudentsController@update')->name('update');
            Route::delete('/{student}', 'StudentsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('student-classes')->name('student-classes/')->group(static function () {
            Route::get('/', 'StudentClassesController@index')->name('index');
            Route::get('/create', 'StudentClassesController@create')->name('create');
            Route::post('/', 'StudentClassesController@store')->name('store');
            Route::get('/{studentClass}/edit', 'StudentClassesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'StudentClassesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{studentClass}', 'StudentClassesController@update')->name('update');
            Route::delete('/{studentClass}', 'StudentClassesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('student-types')->name('student-types/')->group(static function () {
            Route::get('/', 'StudentTypesController@index')->name('index');
            Route::get('/create', 'StudentTypesController@create')->name('create');
            Route::post('/', 'StudentTypesController@store')->name('store');
            Route::get('/{studentType}/edit', 'StudentTypesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'StudentTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{studentType}', 'StudentTypesController@update')->name('update');
            Route::delete('/{studentType}', 'StudentTypesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('board-members')->name('board-members/')->group(static function () {
            Route::get('/', 'BoardMembersController@index')->name('index');
            Route::get('/create', 'BoardMembersController@create')->name('create');
            Route::post('/', 'BoardMembersController@store')->name('store');
            Route::get('/{boardMember}/edit', 'BoardMembersController@edit')->name('edit');
            Route::post('/bulk-destroy', 'BoardMembersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{boardMember}', 'BoardMembersController@update')->name('update');
            Route::delete('/{boardMember}', 'BoardMembersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('join-leave-student-histories')->name('join-leave-student-histories/')->group(static function () {
            Route::get('/', 'JoinLeaveStudentHistoriesController@index')->name('index');
            Route::get('/create', 'JoinLeaveStudentHistoriesController@create')->name('create');
            Route::post('/', 'JoinLeaveStudentHistoriesController@store')->name('store');
            Route::get('/{joinLeaveStudentHistory}/edit', 'JoinLeaveStudentHistoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'JoinLeaveStudentHistoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{joinLeaveStudentHistory}', 'JoinLeaveStudentHistoriesController@update')->name('update');
            Route::delete('/{joinLeaveStudentHistory}', 'JoinLeaveStudentHistoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('join-leave-member-histories')->name('join-leave-member-histories/')->group(static function () {
            Route::get('/', 'JoinLeaveMemberHistoriesController@index')->name('index');
            Route::get('/create', 'JoinLeaveMemberHistoriesController@create')->name('create');
            Route::post('/', 'JoinLeaveMemberHistoriesController@store')->name('store');
            Route::get('/{joinLeaveMemberHistory}/edit', 'JoinLeaveMemberHistoriesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'JoinLeaveMemberHistoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{joinLeaveMemberHistory}', 'JoinLeaveMemberHistoriesController@update')->name('update');
            Route::delete('/{joinLeaveMemberHistory}', 'JoinLeaveMemberHistoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('member-attendances')->name('member-attendances/')->group(static function () {
            Route::get('/', 'MemberAttendancesController@index')->name('index');
            Route::get('/create', 'MemberAttendancesController@create')->name('create');
            Route::post('/import-attendance', 'MemberAttendancesController@import')->name('create');
            Route::post('/', 'MemberAttendancesController@store')->name('store');
            Route::get('/{memberAttendance}/edit', 'MemberAttendancesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'MemberAttendancesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{memberAttendance}', 'MemberAttendancesController@update')->name('update');
            Route::delete('/{memberAttendance}', 'MemberAttendancesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('member-attendances')->name('member-attendances/')->group(static function () {
            Route::get('/', 'MemberAttendancesController@index')->name('index');
            Route::post('/import-attendance', 'MemberAttendancesController@import')->name('create');
            Route::get('/create', 'MemberAttendancesController@create')->name('create');
            Route::post('/', 'MemberAttendancesController@store')->name('store');
            Route::get('/{memberAttendance}/edit', 'MemberAttendancesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'MemberAttendancesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{memberAttendance}', 'MemberAttendancesController@update')->name('update');
            Route::delete('/{memberAttendance}', 'MemberAttendancesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('archive-categories')->name('archive-categories/')->group(static function() {
            Route::get('/',                                             'ArchiveCategoriesController@index')->name('index');
            Route::get('/create',                                       'ArchiveCategoriesController@create')->name('create');
            Route::post('/',                                            'ArchiveCategoriesController@store')->name('store');
            Route::get('/{archiveCategory}/edit',                       'ArchiveCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ArchiveCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{archiveCategory}',                           'ArchiveCategoriesController@update')->name('update');
            Route::delete('/{archiveCategory}',                         'ArchiveCategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('archive-categories')->name('archive-categories/')->group(static function() {
            Route::get('/',                                             'ArchiveCategoriesController@index')->name('index');
            Route::get('/create',                                       'ArchiveCategoriesController@create')->name('create');
            Route::post('/',                                            'ArchiveCategoriesController@store')->name('store');
            Route::get('/{archiveCategory}/edit',                       'ArchiveCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ArchiveCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{archiveCategory}',                           'ArchiveCategoriesController@update')->name('update');
            Route::delete('/{archiveCategory}',                         'ArchiveCategoriesController@destroy')->name('destroy');
            Route::get('/export',                                       'ArchiveCategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('archive-subcategories')->name('archive-subcategories/')->group(static function() {
            Route::get('/',                                             'ArchiveSubcategoriesController@index')->name('index');
            Route::get('/create',                                       'ArchiveSubcategoriesController@create')->name('create');
            Route::post('/',                                            'ArchiveSubcategoriesController@store')->name('store');
            Route::get('/{archiveSubcategory}/edit',                    'ArchiveSubcategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ArchiveSubcategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{archiveSubcategory}',                        'ArchiveSubcategoriesController@update')->name('update');
            Route::delete('/{archiveSubcategory}',                      'ArchiveSubcategoriesController@destroy')->name('destroy');
            Route::get('/export',                                       'ArchiveSubcategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('archives')->name('archives/')->group(static function() {
            Route::get('/',                                             'ArchivesController@index')->name('index');
            Route::get('/create',                                       'ArchivesController@create')->name('create');
            Route::post('/',                                            'ArchivesController@store')->name('store');
            Route::get('/{archive}/edit',                               'ArchivesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ArchivesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{archive}',                                   'ArchivesController@update')->name('update');
            Route::delete('/{archive}',                                 'ArchivesController@destroy')->name('destroy');
            Route::get('/export',                                       'ArchivesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('activities')->name('activities/')->group(static function() {
            Route::get('/',                                             'ActivitiesController@index')->name('index');
            Route::get('/create',                                       'ActivitiesController@create')->name('create');
            Route::post('/',                                            'ActivitiesController@store')->name('store');
            Route::get('/{activity}/edit',                              'ActivitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ActivitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{activity}',                                  'ActivitiesController@update')->name('update');
            Route::delete('/{activity}',                                'ActivitiesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('sub-activities')->name('sub-activities/')->group(static function() {
            Route::get('/',                                             'SubActivitiesController@index')->name('index');
            Route::get('/create',                                       'SubActivitiesController@create')->name('create');
            Route::post('/',                                            'SubActivitiesController@store')->name('store');
            Route::get('/{subActivity}/edit',                           'SubActivitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SubActivitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{subActivity}',                               'SubActivitiesController@update')->name('update');
            Route::delete('/{subActivity}',                             'SubActivitiesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('branches')->name('branches/')->group(static function() {
            Route::get('/',                                             'BranchesController@index')->name('index');
            Route::get('/create',                                       'BranchesController@create')->name('create');
            Route::post('/',                                            'BranchesController@store')->name('store');
            Route::get('/{branch}/edit',                                'BranchesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BranchesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{branch}',                                    'BranchesController@update')->name('update');
            Route::delete('/{branch}',                                  'BranchesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('restaurants')->name('restaurants/')->group(static function() {
            Route::get('/',                                             'RestaurantsController@index')->name('index');
            Route::get('/create',                                       'RestaurantsController@create')->name('create');
            Route::post('/',                                            'RestaurantsController@store')->name('store');
            Route::get('/{restaurant}/edit',                            'RestaurantsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RestaurantsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{restaurant}',                                'RestaurantsController@update')->name('update');
            Route::delete('/{restaurant}',                              'RestaurantsController@destroy')->name('destroy');
        });
    });
});