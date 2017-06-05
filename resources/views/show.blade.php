@extends('layouts.dashboard')
@section('sub_content')
<div class="row">
    <div class="col s12">
        <a href="{{ route('home') }}" class="margin-right"><strong>Notes</strong></a> <span class="margin-right">>></span> {{ BdHelpers::slugify($note->title) }}
    </div>
    <div class="col s12">
        <div class="card-panel note-pane">
            <h2 class="center-align">{{ $note->title }}</h2>
            <span class="info">
                <i class="fa fa-user"></i> {{ $note->owner->name === Auth::user()->name ? 'You' : $note->owner->name }}
                <i class="fa fa-clock-o"></i> {{ $note->created_at->diffForHumans() }}
            </span>
            <p> {{ $note->content }}</p>
        </div>
    </div>
</div>
@endsection

@section('css')
    @parent
    <style>
        .note-pane {
            margin-top: 30px;
            height: 420px;
        }
        .note-pane p {
            height: 250px;
            overflow: scroll;
        }
        .card-panel i:nth-child(2) {
            margin-left: 0.4rem;
        }
    </style>
@endsection