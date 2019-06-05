@extends('layouts.app')

@section('content')

    <header class="flex items-center m-6">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-gray-700 text-sm font-normal">My Projects</h2>
            <a href="/projects/create" class="button">New project</a>
        </div>
    </header>

    <main class="flex flex-wrap -mx3">
        @forelse($projects as $project)
            <div class="w-1/3 px-3 pb-6">
                <div class="bg-white p-3 rounded-lg" style="height: 200px;">
                    <h3 class="font-normal text-2xl mb-3">{{$project->title}}</h3>
                    <div class="text-gray-500">{{str_limit($project->description, 100)}}</div>
                </div>
            </div>

        @empty
            <div>No projects yet</div>
        @endforelse
    </main>

@endsection


