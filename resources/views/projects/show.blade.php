@extends('layouts.app')

@section('content')

    <h1>{{$project->title}}</h1>
    <div>
        {{$project->description}}
    </div>
    <div class="container">
        <a href="/projects" class="button is-text">Go back</a>
    </div>

@endsection