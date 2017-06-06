@extends('layouts.dashboard')
@section('sub_content')
    <div class="row">
        <div class="col s12">
            <p class="right-align underline">Shared Notes</p>
        </div>
        @foreach($sharedNotes as $note)
            <div class="col s4">
                <div class="card-panel note white">
                    <h5 class="center-align truncate">{{ $note->title }}</h5>
                    <p class="justify-align">{{ strlen($note->content) > 100 ? substr($note->content, 0, 100).'...' : $note->content }}</p>
                    <p class="center-align actions">
                        <a href="{{ route('show', ['id' => $note->id, 'slug' => BdHelpers::slugify($note->title)]) }}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Note"><i class="fa fa-eye"></i></a>
                    </p>
                </div>
            </div>
        @endforeach

        {{ $sharedNotes->links() }}
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