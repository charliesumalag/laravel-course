@extends('layouts.app')
@section('title', 'The list of tasks')

@section('content')
<nav class="mb-4">
    <a href="{{ route('task.create') }}" class="link">Add Task</a>
</nav>
    @if (count($tasks))
        @foreach ($tasks as $task)
        <a href="{{route('task.show', ['task' => $task-> id])}}" @class(['line-through' => $task->completed])>
            <div>{{$task->title}}</div>
        </a>
        @endforeach
    @else
        <div>There are no task</div>
    @endif

    @if ($tasks->count())
    <nav class="mt-4">
        {{$tasks->links()}}
    </nav>

    @endif
@endsection
