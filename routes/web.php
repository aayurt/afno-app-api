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
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
            Route::get('/export',                                       'CategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('authors')->name('authors/')->group(static function() {
            Route::get('/',                                             'AuthorsController@index')->name('index');
            Route::get('/create',                                       'AuthorsController@create')->name('create');
            Route::post('/',                                            'AuthorsController@store')->name('store');
            Route::get('/{author}/edit',                                'AuthorsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AuthorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{author}',                                    'AuthorsController@update')->name('update');
            Route::delete('/{author}',                                  'AuthorsController@destroy')->name('destroy');
            Route::get('/export',                                       'AuthorsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('sub-categories')->name('sub-categories/')->group(static function() {
            Route::get('/',                                             'SubCategoriesController@index')->name('index');
            Route::get('/create',                                       'SubCategoriesController@create')->name('create');
            Route::post('/',                                            'SubCategoriesController@store')->name('store');
            Route::get('/{subCategory}/edit',                           'SubCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SubCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{subCategory}',                               'SubCategoriesController@update')->name('update');
            Route::delete('/{subCategory}',                             'SubCategoriesController@destroy')->name('destroy');
            Route::get('/export',                                       'SubCategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');
            Route::get('/export',                                       'PostsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('tags')->name('tags/')->group(static function() {
            Route::get('/',                                             'TagsController@index')->name('index');
            Route::get('/create',                                       'TagsController@create')->name('create');
            Route::post('/',                                            'TagsController@store')->name('store');
            Route::get('/{tag}/edit',                                   'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}',                                       'TagsController@update')->name('update');
            Route::delete('/{tag}',                                     'TagsController@destroy')->name('destroy');
            Route::get('/export',                                       'TagsController@export')->name('export');
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
        Route::prefix('sub-categories')->name('sub-categories/')->group(static function() {
            Route::get('/',                                             'SubCategoriesController@index')->name('index');
            Route::get('/create',                                       'SubCategoriesController@create')->name('create');
            Route::post('/',                                            'SubCategoriesController@store')->name('store');
            Route::get('/{subCategory}/edit',                           'SubCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SubCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{subCategory}',                               'SubCategoriesController@update')->name('update');
            Route::delete('/{subCategory}',                             'SubCategoriesController@destroy')->name('destroy');
            Route::get('/export',                                       'SubCategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('tags')->name('tags/')->group(static function() {
            Route::get('/',                                             'TagsController@index')->name('index');
            Route::get('/create',                                       'TagsController@create')->name('create');
            Route::post('/',                                            'TagsController@store')->name('store');
            Route::get('/{tag}/edit',                                   'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}',                                       'TagsController@update')->name('update');
            Route::delete('/{tag}',                                     'TagsController@destroy')->name('destroy');
            Route::get('/export',                                       'TagsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('authors')->name('authors/')->group(static function() {
            Route::get('/',                                             'AuthorsController@index')->name('index');
            Route::get('/create',                                       'AuthorsController@create')->name('create');
            Route::post('/',                                            'AuthorsController@store')->name('store');
            Route::get('/{author}/edit',                                'AuthorsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AuthorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{author}',                                    'AuthorsController@update')->name('update');
            Route::delete('/{author}',                                  'AuthorsController@destroy')->name('destroy');
            Route::get('/export',                                       'AuthorsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
            Route::get('/export',                                       'CategoriesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');
            Route::get('/export',                                       'PostsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('ads')->name('ads/')->group(static function() {
            Route::get('/',                                             'AdsController@index')->name('index');
            Route::get('/create',                                       'AdsController@create')->name('create');
            Route::post('/',                                            'AdsController@store')->name('store');
            Route::get('/{ad}/edit',                                    'AdsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AdsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ad}',                                        'AdsController@update')->name('update');
            Route::delete('/{ad}',                                      'AdsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('tags')->name('tags/')->group(static function() {
            Route::get('/',                                             'TagsController@index')->name('index');
            Route::get('/create',                                       'TagsController@create')->name('create');
            Route::post('/',                                            'TagsController@store')->name('store');
            Route::get('/{tag}/edit',                                   'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}',                                       'TagsController@update')->name('update');
            Route::delete('/{tag}',                                     'TagsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('authors')->name('authors/')->group(static function() {
            Route::get('/',                                             'AuthorsController@index')->name('index');
            Route::get('/create',                                       'AuthorsController@create')->name('create');
            Route::post('/',                                            'AuthorsController@store')->name('store');
            Route::get('/{author}/edit',                                'AuthorsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AuthorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{author}',                                    'AuthorsController@update')->name('update');
            Route::delete('/{author}',                                  'AuthorsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('members')->name('members/')->group(static function() {
            Route::get('/',                                             'MembersController@index')->name('index');
            Route::get('/create',                                       'MembersController@create')->name('create');
            Route::post('/',                                            'MembersController@store')->name('store');
            Route::get('/{member}/edit',                                'MembersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MembersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{member}',                                    'MembersController@update')->name('update');
            Route::delete('/{member}',                                  'MembersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('lineages')->name('lineages/')->group(static function() {
            Route::get('/',                                             'LineagesController@index')->name('index');
            Route::get('/create',                                       'LineagesController@create')->name('create');
            Route::post('/',                                            'LineagesController@store')->name('store');
            Route::get('/{lineage}/edit',                               'LineagesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LineagesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lineage}',                                   'LineagesController@update')->name('update');
            Route::delete('/{lineage}',                                 'LineagesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('member-categories')->name('member-categories/')->group(static function() {
            Route::get('/',                                             'MemberCategoriesController@index')->name('index');
            Route::get('/create',                                       'MemberCategoriesController@create')->name('create');
            Route::post('/',                                            'MemberCategoriesController@store')->name('store');
            Route::get('/{memberCategory}/edit',                        'MemberCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MemberCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{memberCategory}',                            'MemberCategoriesController@update')->name('update');
            Route::delete('/{memberCategory}',                          'MemberCategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('affiliated-groups')->name('affiliated-groups/')->group(static function() {
            Route::get('/',                                             'AffiliatedGroupsController@index')->name('index');
            Route::get('/create',                                       'AffiliatedGroupsController@create')->name('create');
            Route::post('/',                                            'AffiliatedGroupsController@store')->name('store');
            Route::get('/{affiliatedGroup}/edit',                       'AffiliatedGroupsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AffiliatedGroupsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{affiliatedGroup}',                           'AffiliatedGroupsController@update')->name('update');
            Route::delete('/{affiliatedGroup}',                         'AffiliatedGroupsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('affiliated-categories')->name('affiliated-categories/')->group(static function() {
            Route::get('/',                                             'AffiliatedCategoriesController@index')->name('index');
            Route::get('/create',                                       'AffiliatedCategoriesController@create')->name('create');
            Route::post('/',                                            'AffiliatedCategoriesController@store')->name('store');
            Route::get('/{affiliatedCategory}/edit',                    'AffiliatedCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AffiliatedCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{affiliatedCategory}',                        'AffiliatedCategoriesController@update')->name('update');
            Route::delete('/{affiliatedCategory}',                      'AffiliatedCategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('students')->name('students/')->group(static function() {
            Route::get('/',                                             'StudentsController@index')->name('index');
            Route::get('/create',                                       'StudentsController@create')->name('create');
            Route::post('/',                                            'StudentsController@store')->name('store');
            Route::get('/{student}/edit',                               'StudentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StudentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{student}',                                   'StudentsController@update')->name('update');
            Route::delete('/{student}',                                 'StudentsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('student-classes')->name('student-classes/')->group(static function() {
            Route::get('/',                                             'StudentClassesController@index')->name('index');
            Route::get('/create',                                       'StudentClassesController@create')->name('create');
            Route::post('/',                                            'StudentClassesController@store')->name('store');
            Route::get('/{studentClass}/edit',                          'StudentClassesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StudentClassesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{studentClass}',                              'StudentClassesController@update')->name('update');
            Route::delete('/{studentClass}',                            'StudentClassesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('student-types')->name('student-types/')->group(static function() {
            Route::get('/',                                             'StudentTypesController@index')->name('index');
            Route::get('/create',                                       'StudentTypesController@create')->name('create');
            Route::post('/',                                            'StudentTypesController@store')->name('store');
            Route::get('/{studentType}/edit',                           'StudentTypesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StudentTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{studentType}',                               'StudentTypesController@update')->name('update');
            Route::delete('/{studentType}',                             'StudentTypesController@destroy')->name('destroy');
        });
    });
});