@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{$channel->name}}

                        <a href="{{ route('channel.upload',$channel->id) }}">Upload Videos</a>
                    </div>

                    <div class="card-body">
                       @if($channel->editable())
                        <form
                           id="update-channel-form"
                           action="{{route('channels.update',$channel->id)}}"
                           method="POST"
                           enctype="multipart/form-data"
                       >
                           @csrf
                           @method('PATCH')

                            @endif

                           <div onclick="document.getElementById('image').click()"  class="form-group row justify-content-center">
                               <div class="channel-avatar">
                                   {{--
                                   --}}
                                   @if($channel->editable())
                                       <div class="channel-avatar-overlay">
                                           cam
                                       </div>
                                   @endif
                                   <img src="{{$channel->image()}}" alt="" class="img-fluid">
                               </div>
                           </div>

                           <div class="form-group">
                               <h4 class="text-center">
                                   {{$channel->name}}

                                   <p class="text-center">{{$channel->description}}</p>
                                   <div class="text-center">
                                       <subscribe-button :channel="{{$channel}}" :initial-subscriptions='{{ $channel->subscriptions }}' inline-template >
                                           <button class="btn btn-danger" @click="toggleSubscription">
                                               @{{owner?'': subscribed?'Unsubscribe': 'Subscribe'}}
                                               @{{count }}
                                               @{{owner?'Subscribers':'' }}
                                           </button>
                                       </subscribe-button>
                                   </div>


                               </h4>
                           </div>





                           @if($channel->editable())
                               <input onchange="document.getElementById('update-channel-form').submit()" style="display:none;" type="file" name="image" id="image">

                               <div class="form-group">
                                   <label for="name" class="form-control-label">Name</label>
                                   <input id="name" type="text" class="form-control" name="name" value="{{$channel->name}}"/>

                               </div>

                               <div class="form-group">
                                   <label for="description" class="form-control-label">Description</label>
                                   <textarea name="description" id="description" cols="3" rows="3" class="form-control">{{ $channel->description }}</textarea>

                               </div>

                               @if($errors->any())
                                   <ul class="list-group mb-5">
                                       @foreach($errors->all() as $error)
                                           <li class="list-group-item text-danger">
                                               {{$error}}
                                           </li>

                                       @endforeach
                                   </ul>
                               @endif

                               <button type="submit" class="btn btn-info">Update Channel</button>
                           @endif


                            @if($channel->editable())
                        </form>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
