<?php

use Illuminate\Http\Request;

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

// Route::middleware(['auth:api'])->group(function () {
    // Route::post('/projects/{project}/apps/{app}/submissions', function (Request $request) {
    //     return $request->user();
    // });

    // Route::apiResource('projects.apps.submissions', 'SubmissionController')->only(['store']);
Route::any('/projects/{project}/apps/{app}/submissions', 'SubmissionController@store');
// });
