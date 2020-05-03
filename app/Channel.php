<?php

namespace App;

use App\Model as Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channel extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $guarded=[];
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image(){
        if($this->media->first()){
        return $this->media()->first()->getFullUrl('thumb');
    }

        return null;
    }

    public function registerMediaConversions(Media $media = null)
    {
        // TODO: Implement registerMediaConversions() method.
    $this->addMediaConversion('thumb')
        ->width(100)
        ->height(100);
    }
}