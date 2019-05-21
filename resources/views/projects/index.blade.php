@extends('layouts.app')

@section('content')
    <h1>Birdboard</h1>
    <div class="container">
        <a href="/projects/create" class="button is-primary">New project</a>
    </div>

    <div class="container">
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
    </div>
@endsection


