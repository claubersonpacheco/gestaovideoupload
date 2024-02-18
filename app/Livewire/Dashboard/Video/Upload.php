<?php

namespace App\Livewire\Dashboard\Video;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Nette\NotImplementedException;
use Pion\Laravel\ChunkUpload\Handler\ContentRangeUploadHandler;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;


class Upload extends Component
{

    public $record ;

    public function mount()
    {

        if (!method_exists($this, 'onSuccess')) {
            throw new NotImplementedException('An onSuccess handler method is required.');
        }
    }

    public function handleSuccess($name, $path)
    {
        $this->onSuccess(new UploadedFile(storage_path('app/chunks/' . $path), $name));
    }

    public function onSuccess(UploadedFile $file)
    {


        $dbVideo = Video::find($this->record);

        $dbVideo->uploadVideoFromBunny($dbVideo->guid, $file->getRealPath());

        $dbVideo->update([
            'file_path' => $file->storeAs('videos', Str::uuid().'.'.$file->getClientOriginalExtension()),
        ]);

        //return redirect()->route('videos');
        //$this->dispatch('render');

    }

    public function handleChunk(Request $request)
    {

        $receiver = new FileReceiver(
            UploadedFile::fake()->createWithContent('file', $request->getContent()),
            $request,
            ContentRangeUploadHandler::class,
        );

        $save = $receiver->receive();

        if ($save->isFinished()) {

            return response()->json([
                'file' => $save->getFile()->getFilename()
            ]);
        }

        $save->handler();
    }

    #[Title('Upload Video')]
    public function render()
    {

        $video = Video::findOrFail($this->record);

        return view('livewire.dashboard.video.upload', [
            'name' => $video->name,
            'guid' => $video->guid,
        ]);
    }

    public function cancel()
    {
        return redirect()->route('videos');
    }
}
