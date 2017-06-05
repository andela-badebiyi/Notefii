@extends('layouts.dashboard')
@section('sub_content')
<div class="row">
    <div class="col s12">
        <p class="right-align underline">New</p>
    </div>
    <form class="col s12" action="{{ route('store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
                @if ($errors->first('title'))
                    <input id="title" type="text" name="title" maxlength=50 class="has-error">
                    <span class="red-text">{{ $errors->first('title') }}</span>
                @else
                    <input id="title" type="text" name="title" maxlength=50>
                @endif
                <label for="title">Title</label>
            </div>
            <div class="input-field col s12">
                @if($errors->first('content'))
                    <textarea id="content" class="materialize-textarea has-error" name="content" maxlength=3000></textarea>
                    <label for="content">Content</label>
                    <span class="red-text">{{ $errors->first('content') }}</span>
                @else 
                    <textarea id="content" class="materialize-textarea" name="content" maxlength=3000></textarea>
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