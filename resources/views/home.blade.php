@extends('layouts.dashboard')
@section('sub_content')
    <div class="row">
        <div class="col s12">
            <p class="right-align underline">My Notes</p>
        </div>
        @foreach($notes as $note)
            <div class="col s4">
                <div class="card-panel note white">
                    <h5 class="center-align truncate">{{ $note->title }}</h5>
                    <p class="justify-align">{{ strlen($note->content) > 100 ? substr($note->content, 0, 100).'...' : $note->content }}</p>
                    <p class="center-align actions">
                        <a href="{{ route('show', ['id' => $note->id, 'slug' => BdHelpers::slugify($note->title)]) }}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Note"><i class="fa fa-eye"></i></a> | 
                        <a href="{{ route('edit', ['id' => $note->id, 'slug' => BdHelpers::slugify($note->title)]) }}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit Note"><i class="fa fa-pencil"></i></a> | 
                        <a href="#!" onClick="document.getElementById('deletePost').submit()" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete Note"><i class="fa fa-times"></i></a> | 
                        <a href="#modal{{ $note->id }}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Share Note"><i class="fa fa-share-alt"></i></a></p>
                </div>
                <div class="hide delete-form">
                    <form action="{{ route('delete') }}" method="POST" id="deletePost">
                        {{ csrf_field() }}
                        <input type="text" name="id" value="{{ $note->id }}" />
                        <button type="submit">submit</button>
                    </form>
                </div>

                <!-- Modal Structure -->
                <div id="modal{{ $note->id }}" class="modal">
                    <form action="{{ route('share', ['note_id' => $note->id ]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-content">
                            <h4 >Share '{{ $note->title }}' with</h5>
                            <input type="email" name="email" placeholder="Enter email" required />
                        </div>
                        <div class="modal-footer">
                            <button type="subit" class="waves-effect waves-green btn-flat">Share</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $notes->links() }}
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
       