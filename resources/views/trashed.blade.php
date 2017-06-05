@extends('layouts.dashboard')
@section('sub_content')
    <div class="row">
        <div class="col s12">
            <p class="right-align underline">Trashed</p>
        </div>
        @foreach($trashedNotes as $note)
            <div class="col s4">
                <div class="card-panel note white">
                    <h5 class="center-align truncate">{{ $note->title }}</h5>
                    <p class="justify-align">{{ strlen($note->content) > 100 ? substr($note->content, 0, 100).'...' : $note->content }}</p>
                    <p class="center-align actions">
                        <a href="#!" onClick="document.getElementById('restore-form').submit()">Restore</a> | <a href="#!" onClick="document.getElementById('deletePost').submit()">Delete</a>
                    </p>
                </div>
                <div class="hide delete-form">
                    <form action="{{ route('permanent-delete') }}" method="POST" id="deletePost">
                        {{ csrf_field() }}
                        <input type="text" name="id" value="{{ $note->id }}" />
                        <button type="submit">submit</button>
                    </form>
                </div>
                <div class="hide restore-form">
                    <form action="{{ route('restore', ['id' => $note->id]) }}" method="POST" id="restore-form">
                        {{ csrf_field() }}
                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $trashedNotes->links() }}
    </div>
@endsection

@section('css')
    @parent
    <style>
        h5 {
            width: 100%;
        }
        .note {
            height: 180px;
            min-height: 180px;
        }

        .pages {
            position: absolute;
            bottom: 4px;
            width: 100%;
        }

        .card-panel {
            position: relative;
        }

        .actions {
            position: absolute;
            bottom: 4px;
            width: 100%;
            left: 0;
        }
    </style>
@endsection