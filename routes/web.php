<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhook', [\App\Livewire\Dashboard\Video\Webhook::class, 'webhook'])->name('webhook.verify');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {




    Route::get('/videos/{record}/getVideo', [\App\Livewire\Dashboard\Video\View::class, 'getVideo'])->name('getVideo');
    Route::get('/videos/{record}/view', \App\Livewire\Dashboard\Video\View::class)->name('videos.view');


    //video

    Route::get('/videos/webhook/buscadados', App\Livewire\Dashboard\Video\Webhook::class)->name('video.busca');
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

    Route::get('/', \App\Livewire\Dashboard\Home::class)->name('dashboard');
});

require __DIR__.'/auth.php';


