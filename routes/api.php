<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group(['middleware' => 'auth:api'], function ($router) {

    /** Lang is not Required */
    Route::apiResource('files', 'FileController');
    Route::apiResource('users', 'UserController');
    Route::apiResource('roles', 'RoleController');
    Route::apiResource('localizations', 'LocalizationController');

    /** multilang */
    Route::group([
        'prefix'     => '{locale}',
        'where'      => ['locale' => '[a-zA-Z]{2}'],
        'middleware' => ['setlocale']
    ], function () {
        Route::apiResource('contacts', 'ContactController');
        Route::apiResource('dictionaries', 'DictionaryController');
        Route::apiResource('blogs', 'BlogController');
        Route::apiResource('vacancies', 'VacancyController');
        Route::apiResource('abouts', 'AboutController');
        Route::apiResource('feedbacks', 'FeedBackController');
        Route::apiResource('numbers', 'NumberController');
        Route::apiResource('slides', 'SlideController');
        Route::apiResource('workingstyles', 'WorkingStyleController');
        Route::apiResource('frontboxes', 'FrontBoxController');
    });
});
