@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$video->title}}</div>
                    <div class="card-body">
                        <videojs-player :source=`{{"videos/{$video->id}/{$video->id}.m3u8"}}`  inline-template>
                            <video ref="videoPlayer" class="video-js vjs-default-skin" height="320" width="640"></video>
                        </videojs-player>
                        {{--<video-js id="video" class="vjs-default-skin" controls preload="auto" width="640" height="268">
                            <source src='{{asset(Storage::url("videos/{$video->id}/{$video->id}.m3u8"))}}' type="application/x-mpegURL">
                        </video-js>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .vjs-default-skin{
        width: 100%;
    }
</style>
@endsection
@section('scripts')
 {{--   <script src="{{ asset('js/video.js') }}" ></script>
<script >
   var player1 = videojs('video');
   var viewLogged = false;
   player1.on('timeupdate',function (){
       var percentagePlayed =  Math.ceil(100 * (player1.currentTime() / player1.duration()))
       if(percentagePlayed > 90 & !viewLogged){}

   });

</script>--}}
@endsection
