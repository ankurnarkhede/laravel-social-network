
@extends('layouts.master')

@section('title')
    Idli-Account
@endsection

@section('content')

    <div class="row">
        @include('message_block')
    </div>


    {{--acc form--}}

    <div class="row">
        <form class="col s12" method="post" action="{{ route('account.save') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" name="name" type="text" class="validate" value="{{ $user->name }}">
                    <label class="active" for="name">Name</label>
                </div>

            </div>

            <div class="file-field input-field">
                <div class="btn">
                    <span>Image</span>
                    <input type="file" name="image" id="image">
                </div>
                <div class="file-path-wrapper">
                    <input id="image_path" name="image_path" class="file-path validate" type="text">
                </div>

            </div>

            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="submit" value="Save" class=" waves-effect waves-green btn-flat" name="save_acc" id="save_acc">

        </form>
    </div>

    @if(Storage::disk('local')->has($user->name.'-'.$user->id.'.jpg'))
    <div class="row">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="{{ route('account.image', ['filename'=>$user->name.'-'.$user->id.'.jpg']) }}" alt=""Profile_image>

                </div>


            </div>
        </div>
    </div>
    @endif



@endsection

