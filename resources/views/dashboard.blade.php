
@extends('layouts.master')

@section('title')
    Idli-Dashboard
@endsection

@section('content')

    <div class="row">
        @include('message_block')

        <div class="col s12 m10 ">
            What do you wanna say?
            <form method="post" action="{{ route('CreatePost') }}">
                    <div class="input-field col s12">
                        <textarea id="body" name="body" class="materialize-textarea"></textarea>
                        <label for="body">Create Post</label>
                    </div>



                    <div class="input-field col s4" type="submit">
                        <button class="btn waves-effect waves-light col s12" name="post_submit" type="submit">Post</button>
                    </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}">


            </form>
        </div>
    </div>

    {{--other users posts--}}
    <div class="row">
        <div class="col s12 m10">
            <h4 class="header">What others say...</h4>

            @foreach($posts as $post)
                <div class="card horizontal">
                    <div class="card-stacked">

                        <div class="card-content">
                            <span class="card-title text">{{ $post->user->name }}</span>
                            <p id="display_post_body_{{ $post->id }}">{{ $post->body }}</p>
                            <p class="timestamp">Posted on : {{ $post->created_at }}</p>
                        </div>

                        <div class="card-action">
                            <!-- Modal Trigger -->
                            <a href="#" class="like post_action">Like</a>|
                            <a href="#" class="like post_action">Dislike</a>
                            @if(\Illuminate\Support\Facades\Auth::user() == $post->user)
                            |
                            <a id="edit_post" href="#edit_post_modal_{{ $post->id }}" class="post_action modal-trigger">Edit</a>|
                            <a href="{{ route('DeletePost', ['post_id'=>$post->id]) }}" class="post_action">Delete</a>



                            <!-- Modal Structure -->
                                <div id="edit_post_modal_{{ $post->id }}" class="modal ">
                                    <div class="modal-content">
                                        <h4>Edit Post</h4>
                                        <form>
                                            <div class="input-field col s12">
                    <textarea id="post_body" name="post_body" class="materialize-textarea">{{ $post->body }}</textarea>
                                                {{--<label for="body">Edit Post</label>--}}
                                            </div>
                                        <input type="hidden" name="postID" id="postID" value="{{ $post->id }}">



                                            <div class="modal-footer">

                                                <input type="button" value="Save Post" class="modal-action modal-close waves-effect waves-green btn-flat" name="post_save" id="post_save">
                                            </div>

                                            <input type="hidden" name="_token" value="{{ Session::token() }}">


                                        </form>
                                    </div>

                                </div>


                            @endif
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>

<script>
    var token='{{ Session::token() }}';
    // url = '{{ route('edit') }}';
  
</script>

@endsection

