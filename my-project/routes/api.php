<?php

use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('contacts', 'ContactController')->only(['update', 'index', 'show']);
Route::post('contacts/{contact}/notes', 'ContactController@addNote')->name('contacts.addNote');
Route::get('companies/{company}/contacts', 'CompanyController@contacts')->name('companies.contacts');
Route::resource('companies', 'CompanyController')->only(['index','store']);
Route::post('companies/{company}/contacts', 'ContactController@store')->name('companies.contacts.store');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login');

Route::post('/search', [SearchController::class, 'search'])->name('search');

