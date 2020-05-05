<?php

namespace App\Jobs\Videos;

use App\Video;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConvertForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        //
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $low = (new X264('aac'))->setKiloBitrate(100);
        $medium = (new X264('aac'))->setKiloBitrate(250);
        $high = (new X264('aac'))->setKiloBitrate(500);


        FFMpeg::fromDisk('public')
            ->open($this->video->path)
            ->exportForHLS()
            ->addFormat($low)
            ->addFormat($medium)
            ->addFormat($high)
            ->save("videos/{$this->video->id}/{$this->video->id}.m3u8");

    }
}
