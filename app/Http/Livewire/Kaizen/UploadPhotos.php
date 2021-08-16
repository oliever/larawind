<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\WithFileUploads;

use Livewire\Component;

class UploadPhotos extends Component
{
    use WithFileUploads;

    use WithFileUploads;

    public $photo;
    public $photos;

    public function updatedPhoto()
    {
        $r = $this->validate([
            'photo' => 'image|max:6144',
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
        info($this->photos);
    }

    public function render()
    {
        //info(count($this->photos));
        return view('livewire.kaizen.upload-photos');
    }
}
