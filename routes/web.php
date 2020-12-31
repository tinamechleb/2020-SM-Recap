<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\Controller@home');
Route::get('/test', 'App\Http\Controllers\Controller@test');
Route::get('/admin/emails/send/{id}', 'App\Http\Controllers\EmailController@send');


/*
|--------------------------------------------------------------------------
| CMS GET routes for non signed in admins
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::middleware(['web', 'admin'])->group(function () {
        Route::get('/', 'App\Http\Controllers\CmsController@redirectToLoginForm');
        Route::get('login', 'App\Http\Controllers\CmsController@showLoginForm')->name('admin-login-form');
    });

    // Asset
    Route::get('/asset', 'App\Http\Controllers\CmsController@asset');

    /*
    |--------------------------------------------------------------------------
    | CMS POST routes for non signed in admins
    |--------------------------------------------------------------------------
    */

    Route::middleware(['web'])->group(function () {
        Route::post('login', 'App\Http\Controllers\CmsController@login')->name('admin-login');
    });


    /*
    |--------------------------------------------------------------------------
    | CMS basic routes for signed in admins
    |--------------------------------------------------------------------------
    */

    Route::middleware(['web', 'admin'])->group(function () {
        Route::get('logout', 'App\Http\Controllers\CmsController@logout')->name('admin-logout');
        Route::get('home', function() {
            return redirect('admin/emails');
        })->name('admin-home');
        Route::get('profile', 'App\Http\Controllers\CmsController@showProfile')->name('admin-profile');
        Route::get('profile/edit', 'App\Http\Controllers\CmsController@showEditProfile')->name('admin-profile-edit');
        Route::post('profile/edit', 'App\Http\Controllers\CmsController@editProfile');
        Route::resource('/admins', 'App\Http\Controllers\AdminsController');
        Route::resource('/admin-roles', 'App\Http\Controllers\AdminRolesController');

        // Cms Pages managment routes
        Route::get('/cms-pages/icons', 'App\Http\Controllers\CmsPagesController@icons');
        Route::get('/cms-pages/order', 'App\Http\Controllers\CmsPagesController@orderIndex');
        Route::get('/cms-pages', 'App\Http\Controllers\CmsPagesController@index');
        Route::get('/cms-pages/order', 'App\Http\Controllers\CmsPagesController@order');
        Route::get('/cms-pages/create', 'App\Http\Controllers\CmsPagesController@create');
        Route::get('/cms-pages/create/custom', 'App\Http\Controllers\CmsPagesController@createCustom');
        Route::get('/cms-pages/{id}/edit', 'App\Http\Controllers\CmsPagesController@edit');
        Route::get('/cms-pages/custom/{id}/edit', 'App\Http\Controllers\CmsPagesController@editCustom');
        Route::post('/cms-pages/order', 'App\Http\Controllers\CmsPagesController@orderSubmit');
        Route::post('/cms-pages', 'App\Http\Controllers\CmsPagesController@store');
        Route::post('/cms-pages/custom', 'App\Http\Controllers\CmsPagesController@storeCustom');
        Route::post('/cms-pages/order', 'App\Http\Controllers\CmsPagesController@changeOrder');
        Route::put('/cms-pages/{id}', 'App\Http\Controllers\CmsPagesController@update');
        Route::put('/cms-pages/custom/{id}', 'App\Http\Controllers\CmsPagesController@updateCustom');
        Route::delete('/cms-pages/{id}', 'App\Http\Controllers\CmsPagesController@destroy');

        //Logs
        Route::get('/logs', 'App\Http\Controllers\LogsController@index');

        // Cms Pages routes
        foreach (App\CmsPage::where('custom_page', 0)->get() as $cms_page) {
            Route::get('/' . $cms_page->route, 'App\Http\Controllers\CmsPageController@index')->defaults('route', $cms_page->route);
            Route::get('/' . $cms_page->route . '/order', 'App\Http\Controllers\CmsPageController@order')->defaults('route', $cms_page->route);
            Route::get('/' . $cms_page->route . '/create', 'App\Http\Controllers\CmsPageController@create')->defaults('route', $cms_page->route);
            Route::get('/' . $cms_page->route . '/{id}', 'App\Http\Controllers\CmsPageController@show')->defaults('route', $cms_page->route);
            Route::get('/' . $cms_page->route . '/{id}/edit', 'App\Http\Controllers\CmsPageController@edit')->defaults('route', $cms_page->route);

            Route::post('/' . $cms_page->route, 'App\Http\Controllers\CmsPageController@store')->defaults('route', $cms_page->route);
            Route::put('/' . $cms_page->route . '/order', 'App\Http\Controllers\CmsPageController@changeOrder')->defaults('route', $cms_page->route);
            Route::put('/' . $cms_page->route . '/{id}', 'App\Http\Controllers\CmsPageController@update')->defaults('route', $cms_page->route);
            // Both routes are the same but have different method for roles purposes
            Route::post('/' . $cms_page->route . '/edit/images', 'App\Http\Controllers\CmsPageController@uploadImages')->defaults('route', $cms_page->route);
            Route::put('/' . $cms_page->route . '/edit/images', 'App\Http\Controllers\CmsPageController@uploadImages')->defaults('route', $cms_page->route);
            Route::delete('/' . $cms_page->route . '/{id}', 'App\Http\Controllers\CmsPageController@destroy')->defaults('route', $cms_page->route);
        }

        Route::get('emails', 'App\Http\Controllers\EmailController@index');
        Route::get('emails/{id}', 'App\Http\Controllers\EmailController@show');
    });

    /*
    |--------------------------------------------------------------------------
    | APIs
    |--------------------------------------------------------------------------
    */

    Route::middleware(['api'])->group(function () {
        foreach (App\CmsPage::where('custom_page', 0)->where('apis', 1)->get() as $cms_page) {
            Route::post('/' . $cms_page->route, 'App\Http\Controllers\ApisController@index')->defaults('route', $cms_page->route);
            Route::post('/' . $cms_page->route . '/{id}', 'App\Http\Controllers\ApisController@single')->defaults('route', $cms_page->route);
        }
    });

});