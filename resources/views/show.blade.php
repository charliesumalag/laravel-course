@extends('layouts.app')

@section('title', $task->title)
@section('content')


<div class="mb-4">
    <a href="{{ route('task.index') }}" class="link">◁ Go back to the list</a>
</div>

<p class="mb-4 text-slate-700">{{$task->description}}</p>
@if ($task->long_description)
    <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
@endif


<p class="mb-4 text-sm text-slate-500">Created {{$task->created_at->diffForHumans() }} • Updated {{$task->updated_at->diffForHumans() }}</p>

@if ($task->completed)
    <p class="mb-4"><span class="font-medium text-green-500">Completed</span></p>
@else
    <p class="mb-4 font-medium text-red-500">Not Completed</p>
@endif


<div class="flex gap-2">
    <a href="{{ route('task.edit', ['task'=> $task]) }}" class="btn">Edit</a>


    <form method="POST" action="{{ route('task.toggle-complete', ['task'=>$task]) }}">
        @csrf
        @method('PUT')
        <button class="btn" type="submit">Mark as {{$task->completed ? 'not completed' : 'completed'}}</button>
    </form>


    <form action="{{ route('task.destroy', ['task'=> $task]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>

@endsection
