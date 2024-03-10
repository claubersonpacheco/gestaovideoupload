<?php

namespace App\Observers;

use App\Models\Setting;
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

}
