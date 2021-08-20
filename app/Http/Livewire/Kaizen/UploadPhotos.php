<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\WithFileUploads;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\Photo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UploadPhotos extends Component
{
    use WithFileUploads;

    public $photo;
    public $photos;
    public $savedPhotos;
    public $kaizen;

    protected $listeners = ['kaizenAdded'];

    public function mount(Kaizen $kaizen = null){
        $this->kaizen = $kaizen;
        //$this->rapidCauses = RapidCause::where(['kaizen_id'=>$kaizen->id])->get();
        foreach(Photo::where(['model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $this->savedPhotos[$savedPhoto->id] = $savedPhoto;
        }
    }

    public function updatedPhoto()
    {
        $r = $this->validate([
            //'photo' => 'image|max:6144',
            'photo' => 'image',
        ]);

        /* info($this->photo->getRealPath());
        info($this->photo->getClientOriginalName()); */
    }


    public function save()
    {
        if($this->photo){
            /* info($this->photo->getFilename());
            info($this->photo->getRealPath()); */
            $this->photos[] = $this->photo;
        }



        $this->photo = null;

    }

    public function kaizenAdded(Kaizen $kaizen){
        info('saving photos...');
        if($this->photos)
            foreach($this->photos as $photo){
                //info($photo->getFilename());
               // info(get_class(new Photo()));
                $this->resize($photo);
                $kaizenPhoto = Photo::create([
                    'model' => get_class(new Kaizen()),
                    'model_id' => $kaizen->id,
                    'filename' => $photo->getFilename(),
                ]);
                $kaizenPhoto->save();
            }
    }

    private function resize($photo){
        $img = Image::make($photo);
        $img->resize(null, 1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::makeDirectory('photos/');
        $img->save(storage_path('app/photos/' . $photo->getFilename()));
        $img->resize(null, 315, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::makeDirectory('photos/thumbnail/');
        $img->save(storage_path('app/photos/thumbnail/' . $photo->getFilename()));
    }

    public function render()
    {
        //info(count($this->photos));
        //info($this->savedPhotos);
        return view('livewire.kaizen.upload-photos');
    }
}
