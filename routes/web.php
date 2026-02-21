<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
Route::controller(ProjectController::class)->group(function () {

    // show covers -- frontend
    Route::get('/covers', 'coversIndex')
        ->name('covers.index');
    Route::get('/covers/{project:slug}', 'coverShow')
        ->name('cover.show');

    // show layouts -- frontend
    Route::get('/layouts', 'layoutsIndex')
        ->name('layouts.index');
    Route::get('/layouts/{project:slug}', 'layoutShow')
        ->name('layout.show');

    // show eblasts -- frontend
    Route::get('/eblasts', 'eblastsIndex')
        ->name('eblasts.index');

    // show projects -- backend
    Route::get('/projects', 'projectsIndex')
        ->name('projects.index');

    // add a project -- backend
    Route::get('/projects/create', 'create')
        ->name('projects.create');
    Route::post('/projects', 'store')
        ->name('projects.store');

    // delete a project -- backend
    Route::delete('/projects/{project}', 'destroy')
        ->name('projects.destroy');

    // toggle "is_featured" -- backend
    Route::patch('/projects/{project}/toggle-featured', 'toggleFeatured')
        ->name('projects.toggleFeatured');

});
*/

Route::controller(ProjectController::class)->group(function () {

    // Covers
    Route::get('/covers', 'coversIndex')
        ->name('covers.index');
    Route::get('/covers/{project:slug}', 'coverShow')
        ->name('covers.show');

    // Layouts
    Route::get('/layouts', 'layoutsIndex')
        ->name('layouts.index');
    Route::get('/layouts/{project:slug}', 'layoutShow')
        ->name('layouts.show');

    // Eblasts
    Route::get('/eblasts', 'eblastsIndex')
        ->name('eblasts.index');

    // Misc as “Projects” (frontend)
    /* Route::get('/projects', 'miscIndex')
        ->name('public.projects.index');
    Route::get('/projects/{project:slug}', 'miscShow')
        ->name('public.projects.show'); */

});

Route::prefix('admin')->controller(ProjectController::class)->group(function () {

    Route::get('/projects', 'projectsIndex')
        ->name('admin.projects.index');
    Route::get('/projects/create', 'create')->name('admin.projects.create');
    Route::post('/projects', 'store')->name('admin.projects.store');

    Route::delete('/projects/{project}', 'destroy')->name('admin.projects.destroy');
    Route::patch('/projects/{project}/toggle-featured', 'toggleFeatured')
        ->name('admin.projects.toggleFeatured');

});

Route::controller(MessageController::class)->group(function () {

    // show messages -- backend
    Route::get('/messages', 'messagesIndex')
        ->name('messages.index');

    // send (create) a message -- backend
    Route::get('/messages/send', 'create')
        ->name('message.send');
    Route::post('/messages', 'store')
        ->name('messages.store');

    // delete a message -- backend
    Route::delete('/messages/{message}', 'destroy')
        ->name('message.destroy');

    // mark a message as read/unread -- backend
    Route::patch('/messages/{message}/toggle-read', 'toggleRead')
        ->name('messages.toggleRead');

    Route::patch('/messages/{message}/read', 'markRead')
        ->name('message.markRead');

});

// show login page
Route::get('/admin', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

// handle login form submission
Route::post('/admin', [AdminAuthController::class, 'login'])
    ->name('admin.login.post')
    ->middleware('throttle:10,1'); // optional but smart

// handle logout
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

Route::get('/appy', function () {
    return view('appy');
});

Route::get('/health', fn () => 'ok');
