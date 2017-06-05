@extends('layouts.dashboard')
@section('sub_content')
<div class="row">
    <div class="col s12">
        <a href="{{ route('home') }}" class="margin-right"><strong>Notes</strong></a> <span class="margin-right">>></span> {{ BdHelpers::slugify($note->title) }}
    </div>
    <form class="col s12" style="margin-top: 30px;" action="{{ route('update', ['id' => $note->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
                @if ($errors->first('title'))
                    <input id="title" type="text" name="title" maxlength=50 class="has-error" value="{{ old('title') }}">
                    <span class="red-text">{{ $errors->first('title') }}</span>
                @else
                    <input id="title" type="text" name="title" maxlength=50 value="{{ $note->title }}">
                @endif
                <label for="title">Title</label>
            </div>
            <div class="input-field col s12">
                @if($errors->first('content'))
                    <textarea id="content" class="materialize-textarea has-error" name="content" maxlength=1000 value="{{ old('content') }}"></textarea>
                    <label for="content">Content</label>
                    <span class="red-text">{{ $errors->first('content') }}</span>
                @else 
                    <textarea id="content" class="materialize-textarea" name="content" maxlength=1000>{{ $note->content }}</textarea>
                    <label for="content">Content</label>
                @endif
            </div>
            <div class="col s12 center-align">
                <button class="waves-effect waves-light btn">Save Note</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('css')
    @parent
    <style>
        textarea {
            max-height: 250px;
        }
    </style>
@endsection