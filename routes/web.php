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

//** /:lang/users/create */
//** /:lang/users/1/edit?page=1 */
//** /:lang/users/update/1  */



Route::view('/{lang?}/{module?}/{method?}/{arg?}', 'app');

// Route::any('{any?}' , function(){
//     return view('app')
// });
