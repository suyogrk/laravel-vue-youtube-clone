<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class UploadVideoController extends Controller
{
    //
    public function index(Channel $channel){
        return view('channels.upload',[
            'channel'=>$channel
        ]);
    }

    public function store(Channel $channel){

        $channel->videos()->create([
            'title'=>request()->title,
            'path'=>request()->video->store("channels/$channel->id/videos")
        ]);
    }
}
