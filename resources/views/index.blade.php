@extends('layouts.app')
@section('title', 'The list of tasks')

@section('content')
    @if (count($tasks))
        @foreach ($tasks as $task)
        <a href="{{route('task.show', ['id' => $task-> id])}}">
            <div>{{$task->title}}</div>
        </a>
        @endforeach
    @else
        <div>There are no task</div>
    @endif
@endsection
