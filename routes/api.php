<?php


use App\Http\Controllers\Api\V1\Admin\AuthApiController;

Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Brands
    Route::apiResource('brands', 'BrandsApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Posts
    Route::post('posts/media', 'PostsApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostsApiController');

    // Bids
    Route::apiResource('bids', 'BidsApiController');
});
