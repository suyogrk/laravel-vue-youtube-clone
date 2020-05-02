<?php

namespace App;

use App\Model as Model;

class Channel extends Model
{
    protected $fillable=['name'];
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
