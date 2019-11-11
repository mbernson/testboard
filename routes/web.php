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

Route::redirect('/', '/projects');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::resource('projects', 'ProjectController');
    Route::resource('projects.apps', 'AppController');
    Route::resource('projects.components', 'ComponentController');
    // Route::resource('projects.tests', 'TestController');
    Route::resource('projects.apps.submissions', 'SubmissionController');
    // Route::resource('projects.apps.results', 'ResultController');

});
