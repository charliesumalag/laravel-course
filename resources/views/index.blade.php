@extends('layouts.app')
@section('title', 'The list of tasks')

@section('content')
    @if (count($tasks))
        @foreach ($tasks as $task)
        <a href="{{route('task.show', ['task' => $task-> id])}}">
            <div>{{$task->title}}</div>
        </a>
        @endforeach
    @else
        <div>There are no task</div>
    @endif

    @if ($tasks->count())
    <nav>
        {{$tasks->links()}}
    </nav>

    @endif
@endsection
