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
    public $caption;
    public $photos;
    public $captions;
    public $savedPhotos;
    public $kaizen;
    public $type;

    protected $listeners = ['kaizenAdded'];

    public function mount(Kaizen $kaizen = null){
        $this->kaizen = $kaizen;
        /* info($this->type);
        info($this->kaizen); */
        //$this->rapidCauses = RapidCause::where(['kaizen_id'=>$kaizen->id])->get();
        foreach(Photo::where(['type'=>$this->type, 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $this->savedPhotos[$savedPhoto->id] = $savedPhoto;
        }
    }

    public function updatedPhoto()
    {
        $r = $this->validate([
            //'photo' => 'image|max:6144',
            'photo' => 'image',
        ]);

        info($this->photo->getRealPath());
        info($this->photo->getClientOriginalName());
    }


    public function save()
    {
        if($this->photo){
            if(isset($this->kaizen['id'])){
                $this->resize($this->photo);
                $kaizenPhoto = Photo::create([
                    'model' => get_class(new Kaizen()),
                    'model_id' =>$this->kaizen['id'],
                    'type' => $this->type,
                    'caption' => $this->caption,
                    'filename' => $this->photo->getFilename(),
                ]);
                $kaizenPhoto->save();
                $this->savedPhotos[$kaizenPhoto->id] = $kaizenPhoto;
            }else{
                $this->photos[] = $this->photo;
                $this->captions[] = $this->caption;
            }

        }
        //reset variables
        $this->photo = null;
        $this->caption = null;

    }

    public function kaizenAdded(Kaizen $kaizen){

        if($this->photos){
            info(@"saving {$this->type} photos: " .count($this->photos));
            foreach($this->photos as $index =>$photo){

                $existing = Photo::where(['filename'=>$photo->getFilename()])->count();
                //info('existing: '. $existing);
                if($existing == 0){
                    $this->resize($photo);
                    $kaizenPhoto = Photo::create([
                        'model' => get_class(new Kaizen()),
                        'model_id' => $kaizen->id,
                        'type' => $this->type,
                        'caption' => $this->captions[$index],
                        'filename' => $photo->getFilename(),
                    ]);
                    $kaizenPhoto->save();
                }
            }
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
        return view('livewire.kaizen.upload-photos');
    }
}
