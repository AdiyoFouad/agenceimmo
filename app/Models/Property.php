<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\UploadedFile;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','surface', 'rooms', 'bedrooms', 'floor', 'city', 'postal_code', 'price', 'address', 'sold'];

    public function options(){
        return $this->BelongsToMany(Option::class);
    }

    public function images(){
        return $this->hasMany(Picture::class);
    }

    public function getFirstImage(){
        return $this->images[0] ?? null;
    }

    /**
     * @var UploadedFile[] $files
     */

    public function attachImages(array $files){
        $pictures = [];
        foreach ($files as $file) {
            if($file->getError()){
                continue;
            }
            $filename = $file->store('properties/'. $this->id,'public');
            $pictures[] = [
                'path' => $filename
            ];
        }
        if(count($pictures) > 0) {
            $this->images()->createMany($pictures);
        }
    }
}
