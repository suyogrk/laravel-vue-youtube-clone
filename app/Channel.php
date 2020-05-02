<?php

namespace App;

use App\Model as Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Channel extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable=['name'];
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
