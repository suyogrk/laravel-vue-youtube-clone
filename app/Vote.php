<?php

namespace App;

class Vote extends Model
{
    //
    public function voteable(){
        return $this->morphTo();
    }

}
