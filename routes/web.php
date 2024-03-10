<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard\Video\ListenWebsocket;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhooks', [\App\Livewire\Dashboard\Video\Callback::class, 'handleWebhook'])->name('callback.video');

Route::get('/escuta', ListenWebsocket::class)->name('escuta');


Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/videos/{record}/getVideo', [\App\Livewire\Dashboard\Video\View::class, 'getVideo'])->name('getVideo');
    Route::get('/videos/{record}/view', \App\Livewire\Dashboard\Video\View::class)->name('videos.view');

    //video
    Route::get('/videos/webhook', [App\Livewire\Dashboard\Video\Webhook::class, 'listStatus'])->name('webhook');

    Route::post('/livewire/upload', [\App\Livewire\Dashboard\Video\Upload::class, 'handleChunk'])->name('livewire.upload');
    Route::get('/videos/{record}/upload', \App\Livewire\Dashboard\Video\Upload::class)->name('videos.upload');
    Route::get('/videos/{record}/edit', \App\Livewire\Dashboard\Video\Edit::class)->name('videos.edit');
    Route::get('/videos/create', \App\Livewire\Dashboard\Video\Create::class)->name('videos.create');
    Route::get('/videos', \App\Livewire\Dashboard\Video\Index::class)->name('videos');

    //setting
    Route::get('/setting/{id}', App\Livewire\Dashboard\Setting\Index::class)->name('setting');

    Route::get('/users', \App\Livewire\Dashboard\User\Index::class)->name('users');
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', \App\Livewire\Dashboard\Home\Index::class)->name('dashboard');
});

require __DIR__.'/auth.php';


