@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col s4">
            <div class="card-panel white sidebar">
                <h4 class="center card-panel rounded-border">Menu Options</h4>
                <ul>
                    <li class="left-align"><i class="fa fa-list-alt"></i> <a href="{{ route('home') }}">My Notes ({{ BdHelpers::getNotesCount() }})</a></li>
                    <li class="left-align"><i class="fa fa-pencil"></i> <a href="{{ route('create') }}">Create Note</a></li>
                    <li class="left-align"><i class="fa fa-share-alt"></i> <a href="{{ route('shared') }}">Shared Notes ({{ BdHelpers::getSharedCount() }})</a></li>
                    <li class="left-align"><i class="fa fa-trash"></i> <a href="{{ route('trashed') }}">Trashed ({{ BdHelpers::getTrashedCount() }})</a></li>
                </ul>
            </div>
        </div>
        <div class="col s8">
            <div class="card-panel white main-content">
                @yield('sub_content')
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        .container {
            height: calc(100% - 84px);
        }
        .row {
            height: 100%;
            margin-bottom: 0;
        }
        .sidebar, .main-content {
            height: 520px;
            position: relative;
        }
        .sidebar h4{
            font-size: 2rem;
            margin-bottom: 2rem;
            /*border: solid 2px #444;*/
            padding: 1rem 0.2rem;
        }
        .sidebar ul li {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .sidebar ul li a {

        }

        .rounded-border {
            border-radius: 10px;
        }
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            @if (Session::has('message'))
                Materialize.toast('{{ Session::get("message") }}', 4000);
            @endif
        });
    </script>
@endsection