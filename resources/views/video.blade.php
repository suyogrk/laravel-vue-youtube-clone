@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$video->title}}</div>
                    <div class="card-body">
                        <video-js v-pre id="video" class="vjs-default-skin" controls preload="auto" width="640" height="268">
                            <source src='{{ asset(Storage::url("videos/{$video->id}/{$video->id}.m3u8")) }}' type="application/x-mpegURL">
                        </video-js>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
    <style>
    .vjs-default-skin{
        width: 100%;
    }
    </style>
@endsection
@section('scripts')
    <script src="{{asset('js/video.js') }}" ></script>
    <script>
        window.CURRENT_VIDEO = '{{$video->id}}';
    </script>
    <script src="{{asset('js/player.js')}}"></script>
@endsection
