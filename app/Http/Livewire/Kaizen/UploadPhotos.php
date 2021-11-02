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
    public $kaizen;//set on calling blade e.g. views\livewire\kaizen\nutters.blade.php
    public $type;//set on calling blade e.g. views\livewire\kaizen\nutters.blade.php

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
        info("UploadPhotos::updatedPhoto; kaizen->id: '{$this->kaizen->id}'");
        info(" RealPath:           {$this->photo->getRealPath()}");
        info(" ClientOriginalName: {$this->photo->getClientOriginalName()}");
    }


    public function save()
    {
        info('UploadPhotos::save: ' .  $this->kaizen->id);
        if($this->photo){
            if(isset($this->kaizen['id'])){
                $this->savePhoto($this->photo, $this->kaizen['id']);//immediately save single photo
            }else{
                info(" temp photo: " .$this->photo);
                $this->photos[] = $this->photo;
                $this->captions[] = $this->caption;
                info(" new count: " . count($this->photos));
            }
        }
        //reset variables
        $this->photo = null;
        $this->caption = null;

    }

    public function kaizenAdded(Kaizen $kaizen){
        info('UploadPhotos::kaizenAdded: ' .  $kaizen->id);
        if($this->photos){
            foreach($this->photos as $index => $photo){
                $this->savePhoto($photo, $kaizen->id);
            }
        }
    }

    private function savePhoto($photo, $kaizenId){//save after saving kaizen
        info('UploadPhotos::savePhoto: ' .  $this->kaizen->id);
        $strKaizenId = str_pad($this->kaizen->id, 4,"0", STR_PAD_LEFT);
        $filename = @"k{$strKaizenId}_";
        $kaizenPhoto = Photo::create([
            'model' => get_class(new Kaizen()),
            'model_id' =>$kaizenId,
            'type' => $this->type,
            'caption' => $this->caption,
            'filename' => $photo->getFilename(),
        ]);
        $kaizenPhoto->save();
        $ext =substr($photo->getFilename(),strrpos($photo->getFilename(),'.')+0);
        $strPhotoId = str_pad($kaizenPhoto->id, 5,"0", STR_PAD_LEFT);
        $kaizenPhoto->filename = $filename . "{$strPhotoId}_{$this->type}{$ext}";
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

    public function render()
    {
        return view('livewire.kaizen.upload-photos');
    }
}
