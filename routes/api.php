<?php

use Illuminate\Http\Request;

//public route
        Route::post('product/{category_id}/{fake_id}', 'Api\productController@showTeezerfake');
        Route::post('product/search', ['uses' => 'Api\productController@search']);
        Route::post('showTeezer/{category_id}/{slug}', 'Api\productController@showTeezer');
        Route::get('product', 'Api\productController@index');
        Route::get('6', 'Api\trainingController@index');
        Route::get('1', 'Api\bookController@index');
        Route::get('3', 'Api\outfitController@index');
        Route::get('4', 'Api\projectController@index');
        Route::get('5', 'Api\roomMateController@index');
        Route::get('2', 'Api\furnitureController@index');
        Route::post('increase', 'Api\productController@increasecounter');
        Route::post('contactUs', 'Api\ContactUsController@store');
        Route::get('cities', 'Api\productController@get_city');
        Route::get('allunis', 'Api\productController@allunis');
        Route::post('unis', 'Api\productController@get_uni');
        Route::get('images','Api\productController@images');
        Route::post('profile/{user_id}', 'UserController@profile');

//prefix auth
    Route::prefix('auth')->group(function () {
        //limit request number
        Route::group(['middleware' => 'GrahamCampbell\Throttle\Http\Middleware\ThrottleMiddleware:10,1'], function () {
            Route::post('register', 'AuthController@register');
            Route::post('registerlogin', 'AuthController@registerlogin');
            Route::post('loginverify', 'AuthController@loginverify');
            Route::post('login', 'AuthController@login');
            Route::get('refresh', 'AuthController@refresh');
        });

        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('user', 'UserController@user');
            Route::post('logout', 'AuthController@logout');
        });
    });

// login user can access
    Route::group(['middleware' => 'auth:api'], function () {
            Route::post('book', 'Api\bookController@store');
            Route::post('furniture', 'Api\furnitureController@store');
            Route::post('outfit', 'Api\outfitController@store');
            Route::post('project', 'Api\projectController@store');
            Route::post('training', 'Api\trainingController@store');
            Route::post('roomMate', 'Api\roomMateController@store');
            Route::get('myteezer', 'UserController@myteezer');
            Route::get('myfavorite', 'UserController@myfavoriteapi');
            Route::get('myteezervue', 'UserController@myteezer');
            Route::get('myfavoritevue', 'UserController@myfavorite');
            Route::post('addtofavorite', 'UserController@addtofavorite');
            Route::delete('deletefromfavorite/{id}', 'UserController@deletefromfavorite');
            Route::get('myawards','UserController@MyAwards');
            Route::post('getAward','UserController@getAward');
            Route::post('getSomeElseUserInfo','UserController@getSomeElseUserInfo');
            Route::post('SaveUserInfo','UserController@SaveUserInfo');

//admin
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::get('admin/notverifiedlist', 'Api\adminController@notverifiedlist');
            Route::post('admin/confirmteezer', 'Api\adminController@confirmteezer');
            Route::post('admin/deleteteezer', 'Api\adminController@deleteteezer');
            Route::get('admin/contactus', 'Api\ContactUsController@index')->name('contactus');
            Route::get('admin/users', 'Api\adminController@users');
            Route::get('admin/advertises', 'Api\adminController@advertises');
            Route::get('admin/books', 'Api\adminController@books');
            Route::get('admin/furnitures', 'Api\adminController@furnitures');
            Route::get('admin/roommates', 'Api\adminController@roommates');
            Route::get('admin/projects', 'Api\adminController@projects');
            Route::get('admin/outfits', 'Api\adminController@outfits');
            Route::get('admin/trainings', 'Api\adminController@trainings');
            Route::get('admin/advertiseCounter', 'Api\adminController@advertiseCounter');
            Route::get('admin/userCounter', 'Api\adminController@userCounter');
            Route::post('admin/deleteUser', 'Api\adminController@deleteUser');
        });

//admin and self
            Route::group(['middleware' => 'isAdminOrSelf'], function () {
            Route::post('editbook', 'Api\bookController@editbook');
            Route::post('editfurniture', 'Api\furnitureController@editfurniture');
            Route::post('editoutfit', 'Api\outfitController@editoutfit');
            Route::post('editproject', 'Api\projectController@editproject');
            Route::post('edittraining', 'Api\trainingController@edittraining');
            Route::post('editroomMate', 'Api\roomMateController@editroommate');
            Route::post('deleteproduct', 'Api\productController@deleteproduct');
        });
    });

