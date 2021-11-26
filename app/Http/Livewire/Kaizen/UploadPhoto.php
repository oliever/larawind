<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\WithFileUploads;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\Photo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;
    public $caption;
    //public $photos;
    public $captions;
    public $savedPhotos;
    public $kaizen;//set on calling blade e.g. views\livewire\kaizen\nutters.blade.php
    public $type;//set on calling blade e.g. views\livewire\kaizen\nutters.blade.php
    public $kaizenId;
    public $tempId;

    protected $listeners = ['kaizenAdded'];

    public function mount(Kaizen $kaizen){
        $this->kaizen = $kaizen;
        $this->kaizenId = $this->kaizen->id;
        if(!$this->kaizenId)
            $this->tempId = $this->kaizen->temp_id;
        info("UploadPhotos::mount");
        //info(Str::uuid());
        /* info($this->type);
         */
        //$this->rapidCauses = RapidCause::where(['kaizen_id'=>$kaizen->id])->get();
        $this->savedPhotos[] = [];
        foreach(Photo::where(['type'=>$this->type, 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $this->savedPhotos[] = $savedPhoto;
        }
    }

    public function updatedPhoto()
    {
        $r = $this->validate([
            //'photo' => 'image|max:6144',
            'photo' => 'image',
        ]);
        info("UploadPhotos::updatedPhoto; kaizen->id: '{$this->kaizen->id}'");
        info(" RealPath:           {$this->photo->getRealPath()}");
        info(" ClientOriginalName: {$this->photo->getClientOriginalName()}");
        $this->emit('photoUploaded');
    }


    public function save()
    {
        info('UploadPhotos::save: ' .  $this->kaizen);
        if($this->photo){
            $this->savePhoto($this->photo);//immediately save single photo
        }
        //reset variables
        $this->photo = null;
        $this->caption = null;

    }

    private function savePhoto($photo){//save after saving kaizen
        info('UploadPhotos::savePhoto: ' .  $this->kaizen->id);
        $kaizenId = $this->kaizen->id;
        $strKaizenId = str_pad($kaizenId, 4,"0", STR_PAD_LEFT);
        $filename = @"k_{$strKaizenId}_";
        $model = get_class(new Kaizen());
        if(!$kaizenId){
            $kaizenId = 0;
            $model = $this->tempId;
        }

        $kaizenPhoto = Photo::create([
            'model' => $model,
            'model_id' =>$kaizenId,
            'type' => $this->type,
            'caption' => $this->caption,
            'filename' => $photo->getFilename(),
        ]);
        $kaizenPhoto->save();
        $ext =substr($photo->getFilename(),strrpos($photo->getFilename(),'.')+0);
        $strPhotoId = str_pad($kaizenPhoto->id, 5,"0", STR_PAD_LEFT);
        $kaizenPhoto->filename = $filename . "{$strPhotoId}_{$this->type}{$ext}";
        if(!$kaizenId)
            $kaizenPhoto->filename = "{$this->tempId}_{$kaizenPhoto->id}{$ext}";
        $kaizenPhoto->save();
        $this->resize($photo, $kaizenPhoto->filename);
        $this->savedPhotos[$kaizenPhoto->id] = $kaizenPhoto;
    }

    private function resize($photo, $filename){
        $img = Image::make($photo);
        $img->resize(null, 1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::makeDirectory('photos/');
        $img->save(storage_path('app/photos/' . $filename));
        info(' saved resized 1080: ' . storage_path('app/photos/thumbnail/' . $filename));
        $img->resize(null, 315, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::makeDirectory('photos/thumbnail/');
        $img->save(storage_path('app/photos/thumbnail/' . $filename));
        info(' saved resized 315: ' . storage_path('app/photos/thumbnail/' .$filename));
        return true;
    }

    public function kaizenAdded(Kaizen $kaizen){
        info('UploadPhotos::kaizenAdded: ' .  $kaizen->id);
        foreach(Photo::where(['type'=>$this->type, 'model'=>$this->tempId])->get() as $savedPhoto){
            $savedPhoto -> model = get_class(new Kaizen());
            $savedPhoto -> model_id = $kaizen->id;
            $strKaizenId = str_pad($kaizen->id, 4,"0", STR_PAD_LEFT);
            $strPhotoId = str_pad($savedPhoto->id, 5,"0", STR_PAD_LEFT);
            $ext =substr($savedPhoto->filename,strrpos($savedPhoto->filename,'.')+0);
            $filename = @"k_{$strKaizenId}_";
            $oldFilename = $savedPhoto->filename;
            $savedPhoto->filename = $filename . "{$strPhotoId}_{$this->type}{$ext}";
            $savedPhoto->save();
            info($savedPhoto);
            Storage::move("photos/{$oldFilename}", "photos/{$savedPhoto->filename}");
            Storage::move("photos/thumbnail/{$oldFilename}", "photos/thumbnail/{$savedPhoto->filename}");
        }

        if($this->photos){
            foreach($this->photos as $index => $photo){
                $this->savePhoto($photo);
            }
        }
    }

    public function render()
    {
        return view('livewire.kaizen.upload-photo');
    }
}
