@extends('layouts.app')

@section('content')

    <div class="flex items-center m-6">

        <a href="/projects/create" class="button is-primary">New project</a>
    </div>

    <ul>
        @forelse($projects as $project)
            <li>
                <a class="" href="{{$project->path()}}">
                    {{$project->title}}
                </a>
            </li>
        @empty
            <li>No projects yet</li>
        @endforelse
    </ul>

@endsection


