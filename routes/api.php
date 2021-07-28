<?php


use App\Http\Controllers\Api\V1\Admin\AuthApiController;

Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum', 'CheckBanned']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::get('users/my-bids', [\App\Http\Controllers\Api\V1\Admin\UsersApiController::class, 'myBids']);
    Route::get('users/{user}/change_status', [\App\Http\Controllers\Api\V1\Admin\UsersApiController::class, 'changeStatus'])->name('users.changeStatus');

    Route::apiResource('users', 'UsersApiController');

    // Brands
    Route::apiResource('brands', 'BrandsApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Posts
    Route::get('posts/{post}/sell', 'PostsApiController@sell');
    Route::post('posts/media', 'PostsApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostsApiController');

    // Bids
    Route::apiResource('bids', 'BidsApiController');
});
