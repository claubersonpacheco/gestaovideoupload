<?php

namespace App\Livewire\Dashboard\Video;

use App\Events\VideoEvent;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Nette\NotImplementedException;
use Pion\Laravel\ChunkUpload\Handler\ContentRangeUploadHandler;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;


class Upload extends Component
{

    public $id ;

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


        $dbVideo = Video::find($this->id);

        $return = $dbVideo->uploadVideoFromBunny($dbVideo->guid, $file->getRealPath());


        if($return->success === true) {

            $existe = Storage::exists('/chunks/'.$file->getFilename());


            if($existe === true){

                $dbVideo->update([
                    'file_path' => "https://iframe.mediadelivery.net/embed/" . $dbVideo->videoLibraryId . "/" . $dbVideo->guid
                ]);

                Storage::delete('/chunks/'.$file->getFilename());

            }else{

                dd("Arquivo nao existe");
            }

        }else{

            dd('Erro ao enviar');
        }

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

        $video = Video::findOrFail($this->id);

        return view('livewire.dashboard.video.upload', [
            'name' => $video->name,
            'id' => $video->guid,
        ]);
    }

    public function cancel()
    {
        return redirect()->route('videos.index');
    }
}
