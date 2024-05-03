<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//initial page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//route callback video
Route::post('/webhooks', [\App\Livewire\Dashboard\Video\Callback::class, 'handleWebhook'])->name('callback.video');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {

    //courses
    Route::get('/courses/{id}/users', App\Livewire\Dashboard\Course\Enrollment\ListUsers::class)->name('courses.users');
    Route::get('/courses/{id}/edit', App\Livewire\Dashboard\Course\Edit::class)->name('courses.edit');
    Route::get('/courses/create', App\Livewire\Dashboard\Course\Create::class)->name('courses.create');
    Route::get('/courses', App\Livewire\Dashboard\Course\Index::class)->name('courses.index');

    //Category
    Route::get('/category/{id}/edit', App\Livewire\Dashboard\Category\Edit::class)->name('categories.edit');
    Route::get('/category/create', App\Livewire\Dashboard\Category\Create::class)->name('categories.create');
    Route::get('/category', App\Livewire\Dashboard\Category\Index::class)->name('categories.index');

    //video
    Route::get('/videos/{id}/getVideo', [\App\Livewire\Dashboard\Video\Show::class, 'getVideo'])->name('video.getvideo');
    Route::get('/videos/{id}/show', \App\Livewire\Dashboard\Video\Show::class)->middleware('can:videos.show')->name('videos.show');


    Route::post('/livewire/upload', [\App\Livewire\Dashboard\Video\Upload::class, 'handleChunk'])->name('livewire.upload');
    Route::get('/videos/{id}/upload', \App\Livewire\Dashboard\Video\Upload::class)->middleware('can:videos.upload')->name('videos.upload');
    Route::get('/videos/{id}/edit', \App\Livewire\Dashboard\Video\Edit::class)->middleware('can:videos.edit')->name('videos.edit');
    Route::get('/videos/create', \App\Livewire\Dashboard\Video\Create::class)->middleware('can:videos.create')->name('videos.create');
    Route::get('/videos', \App\Livewire\Dashboard\Video\Index::class)->middleware('can:videos.index')->name('videos.index');

    //User
    Route::get('/users/{id}/role', \App\Livewire\Dashboard\User\RoleUser\UserRole::class )->middleware('can:users.role')->name('users.role');
    Route::get('/users/{id}/edit', App\Livewire\Dashboard\User\Edit::class )->middleware('can:users.edit')->name('users.edit');
    Route::get('/users/create', App\Livewire\Dashboard\User\Create::class)->middleware('can:users.create')->name('users.create');
    Route::get('/users', \App\Livewire\Dashboard\User\Index::class)->middleware('can:users.index')->name('users.index');






    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware('can:profile.edit')->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware('can:profile.update')->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('can:profile.destroy')->name('profile.destroy');

    Route::middleware(['role:master'])->group(function () {

        //permission
        Route::get('/permissions/{id}/edit', App\Livewire\Dashboard\Permission\Edit::class)->name('permissions.edit');
        Route::get('/permissions/create', App\Livewire\Dashboard\Permission\Create::class)->name('permissions.create');
        Route::get('/permissions', App\Livewire\Dashboard\Permission\Index::class)->name('permissions.index');

        //role
        Route::get('/roles/{id}/edit', App\Livewire\Dashboard\Role\Edit::class)->name('roles.edit');
        Route::get('/roles/create', App\Livewire\Dashboard\Role\Create::class)->name('roles.create');
        Route::get('/roles', App\Livewire\Dashboard\Role\Index::class)->name('roles.index');

        //setting
        Route::get('/setting/{id}', App\Livewire\Dashboard\Setting\Index::class)->name('setting.edit');

    });

    // Dashboard
    Route::get('/', \App\Livewire\Dashboard\Home\Index::class)->middleware('can:dashboard.index')->name('dashboard.index');
});

require __DIR__.'/auth.php';


