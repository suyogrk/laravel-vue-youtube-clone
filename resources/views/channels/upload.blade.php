@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <channel-uploads :channel="{{$channel}}" inline-template>
                <div class="col-md-8">

                    <div
                        class="card p-3 d-flex justify-content-center align-items-center"
                    v-if="!selected">
                        <div onclick="document.getElementById('video-files').click()">Click to upload</div>
                        <input
                            type="file"
                            multiple
                            id='video-files'
                            style="display:none"
                            ref="videos"
                            @change="upload"
                        >
                    </div>
                    <div class="card p-3" v-else>
                        <div class="my-4">
                            <div class="progress mb-3">
                                <div
                                    class="progress-bar progress-bar-striped progress-bar-animated"
                                    style="width:50%"
                                    role="progressbar"
                                    aria-valuenow="50"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                >
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-center align-items-center"
                                        style="height: 100px; color:white; font-size: 10px; background: #808080">
                                            Loading Thumbnail...

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="text-center">
                                            My awesome videos
                                        </h4>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>

                </div>
            </channel-uploads>

        </div>
    </div>
@endsection
