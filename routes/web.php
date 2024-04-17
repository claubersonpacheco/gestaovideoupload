<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhooks', [\App\Livewire\Admin\Video\Callback::class, 'handleWebhook'])->name('callback.video');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', \App\Livewire\Dashboard\Home\Index::class)->name('dashboard');
});


Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {


    //courses
    Route::get('/courses/{id}/users', App\Livewire\Admin\Course\Enrollment\ListUsers::class)->name('courses.users');
    Route::get('/courses/{id}/edit', App\Livewire\Admin\Course\Edit::class)->name('courses.edit');
    Route::get('/courses/create', App\Livewire\Admin\Course\Create::class)->name('courses.create');
    Route::get('/courses', App\Livewire\Admin\Course\Index::class)->name('courses');

    //Category
    Route::get('/category/{id}/edit', App\Livewire\Admin\Category\Edit::class)->name('categories.edit');
    Route::get('/category/create', App\Livewire\Admin\Category\Create::class)->name('categories.create');
    Route::get('/category', App\Livewire\Admin\Category\Index::class)->name('categories');

    //permission
    Route::get('/permissions/{id}/edit', App\Livewire\Admin\Permission\Edit::class)->name('permissions.edit');
    Route::get('/permissions/create', App\Livewire\Admin\Permission\Create::class)->name('permissions.create');
    Route::get('/permissions', App\Livewire\Admin\Permission\Index::class)->name('permissions');

    // role
    Route::get('/roles/{id}/edit', App\Livewire\Admin\Role\Edit::class)->name('roles.edit');
    Route::get('/roles/create', App\Livewire\Admin\Role\Create::class)->name('roles.create');
    Route::get('/roles', App\Livewire\Admin\Role\Index::class)->name('roles');


    //video
    Route::get('/videos/{id}/getVideo', [\App\Livewire\Admin\Video\View::class, 'getVideo'])->name('getVideo');
    Route::get('/videos/{id}/view', \App\Livewire\Admin\Video\View::class)->name('videos.view');

    Route::post('/livewire/upload', [\App\Livewire\Admin\Video\Upload::class, 'handleChunk'])->name('livewire.upload');
    Route::get('/videos/{id}/upload', \App\Livewire\Admin\Video\Upload::class)->name('videos.upload');
    Route::get('/videos/{id}/edit', \App\Livewire\Admin\Video\Edit::class)->name('videos.edit');
    Route::get('/videos/create', \App\Livewire\Admin\Video\Create::class)->name('videos.create');
    Route::get('/videos', \App\Livewire\Admin\Video\Index::class)->name('videos');

    //setting
    Route::get('/setting/{id}', App\Livewire\Admin\Setting\Index::class)->name('setting');

    //User
    Route::get('/users/{id}/role', \App\Livewire\Admin\User\RoleUser\UserRole::class )->name('users.role');
    Route::get('/users/{id}/edit', App\Livewire\Admin\User\Edit::class )->name('users.edit');
    Route::get('/users/create', App\Livewire\Admin\User\Create::class)->name('users.create');
    Route::get('/users', \App\Livewire\Admin\User\Index::class)->name('users');

    Route::get('/', \App\Livewire\Admin\Home\Index::class)->name('admin');
});

require __DIR__.'/auth.php';


