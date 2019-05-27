@extends('layouts.app')

@section('content')

    <div class="flex items-center m-6">

        <a href="/projects/create" class="button is-primary">New project</a>
    </div>

    <div class="flex">
        @forelse($projects as $project)
            <div class="bg-white mr-4 p-3 rounded-lg w-1/3">
                <h3 class="font-normal text-2xl mb-3">{{$project->title}}</h3>
                <div>{{str_limit($project->description, 250)}}</div>
            </div>
        @empty
            <div>No projects yet</div>
        @endforelse
    </div>

@endsection


