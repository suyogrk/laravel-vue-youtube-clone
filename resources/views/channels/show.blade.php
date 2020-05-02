@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$channel->name}}</div>

                    <div class="card-body">
                       <form
                           id="update-channel-form"
                           action="{{route('channels.update',$channel->id)}}"
                           method="POST"
                           enctype="multipart/form-data"
                       >
                           @csrf
                           @method('PATCH')
                           <div onclick="document.getElementById('image').click()"  class="form-group row justify-content-center">
                               <div class="channel-avatar">
                                   <div class="channel-avatar-overlay">
                                       cam
                                   </div>
                               </div>
                           </div>

                           <input onchange="document.getElementById('update-channel-form').submit()" style="display:none;" type="file" name="image" id="image">

                           <div class="form-group">
                               <label for="name" class="form-control-label">Name</label>
                               <input id="name" type="text" class="form-control" name="name" value="{{$channel->name}}"/>

                           </div>

                           <div class="form-group">
                               <label for="description" class="form-control-label">Description</label>
                               <textarea name="description" id="description" cols="3" rows="3" class="form-control"></textarea>

                           </div>

                           <button type="submit" class="btn btn-info">Update Channel</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
