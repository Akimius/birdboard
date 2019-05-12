<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<h1>Birdboard</h1>
    <div class="flex-center position-ref full-height">
        <ul>
            @forelse($projects as $project)
                <li>
                    <a href="{{$project->path()}}">
                        {{$project->title}}
                    </a>
                </li>
                @empty
                <li>No projects yet</li>
            @endforelse
        </ul>

    </div>
</body>
</html>
