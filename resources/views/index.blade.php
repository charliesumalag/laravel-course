<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>The list of tasks</h1>
    <div>
        @if (count($tasks))
            @foreach ($tasks as $task)
            <a href="{{route('task.show', ['id' => $task-> id])}}">
                <div>{{$task->title}}</div>
            </a>
            @endforeach
        @else
            <div>There are no task</div>
        @endif
    </div>
</body>
</html>
