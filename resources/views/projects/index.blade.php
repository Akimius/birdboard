@extends('layouts.app')

@section('content')

    <div class="flex items-center m-6">

        <a href="/projects/create" class="button is-primary">New project</a>
    </div>

    <div class="flex">
        @forelse($projects as $project)
            <div class="bg-white mr-4 rounded shadow">
                <h3>{{$project->title}}</h3>
                <div>{{$project->description}}</div>
            </div>
        @empty
            <div>No projects yet</div>
        @endforelse
    </div>

@endsection


