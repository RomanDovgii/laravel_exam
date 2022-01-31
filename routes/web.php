<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\DeletedThingController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\PlaceController;

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
    return view('pages.main');
}) -> name('main');

Route::group(['prefix' => '/things'], function() {
    Route::get('/all-things', [ThingController::class, 'index']) -> name('all-things');
    Route::get('/{id}', [ThingController::class, 'view']) -> name('thing');
});

Route::group(['prefix' => '/things', 'middleware' => 'auth'], function() {
    Route::get('/{user_id}', [ThingController::class, 'index']) -> name('my-things');
    Route::get('/{user_id}/places', [ThingController::class, 'inPlaces']) -> name('places-things');
    Route::get('/{user_id}/work', [ThingController::class, 'inWork']) -> name('work-things');
    Route::get('/{user_id}/using', [ThingController::class, 'inUsage']) -> name('using-things');
    Route::get('/creation', [ThingController::class, 'creation']) -> name('using-things');
    Route::get('/send/{id}', [ThingController::class, 'showSend']) -> name('show-send-thing');
    Route::get('/edit/{id}', [ThingController::class, 'showUpdate']) -> name('show-edit-thing');
    Route::post('/create', [ThingController::class, 'create']) -> name('create-thing');
    Route::post('/edit-thing', [ThingController::class, 'update']) -> name('edit-thing');
    Route::post('/send-thing', [ThingController::class, 'send']) -> name('sendThing');
    Route::get('/delete/{id}', [ThingController::class, 'delete']) -> name('delete-thing');
});

Route::group(['prefix' => '/deleted-things'], function() {
    Route::get('/deleted-all-things', [DeletedThingController::class, 'index']) -> name('deleted-all-things');
    Route::get('/restore/{id}', [DeletedThingController::class, 'restore']) -> name('restore-deleted-thing');
});

Route::group(['prefix' => '/places'], function() {
    Route::get('', [PlaceController::class, 'index']) -> name('all-places');
    Route::get('/{id}', [PlaceController::class, 'view']) -> name('place');
});

Route::group(['prefix' => '/places', 'middleware' => 'auth'], function() {
    Route::post('/create', [PlaceController::class, 'create']) -> name('create-place');
    Route::post('/{id}/edit', [PlaceController::class, 'update']) -> name('edit-place');
    Route::post('/{id}/delete', [PlaceController::class, 'delete']) -> name('remove-place');
});

Route::group(['prefix' => '/user', 'middleware' => 'auth'], function() {
    Route::get('/{id}', [UserController::class, 'info']) -> name('user-page');
    Route::post('/{id}/change', [UserController::class, 'change']) -> name('user-change');
});

Route::group(['prefix' => '/actions'], function() {
    Route::get('/registration', [AuthorizationController::class, 'showSignup']) -> name('showSignup');
    Route::get('/login', [AuthorizationController::class, 'showLogin']) -> name('showSignin');
    Route::post('/registration', [AuthorizationController::class, 'signup']) -> name('signup');
    Route::post('/login', [AuthorizationController::class, 'login']) -> name('signin');
});

Route::group(['prefix' => '/actions', 'middleware' => 'auth'], function() {
    Route::get('/logout', [AuthorizationController::class, 'logout']) -> name('logout');
});

Route::get('/listen', function() {
    return view('listen');
}) -> name('listen');
