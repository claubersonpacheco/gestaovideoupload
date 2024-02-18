<?php

namespace App\Observers;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoObserver
{
    /**
     * Handle the Video "creating" event.
     */
    public function creating(Video $video): void
    {
        $video->user_id = Auth::user()->id;
    }

    /**
     * Handle the Video "updated" event.
     */
    public function updated(Video $video): void
    {
        //
    }


}
