<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Task;



Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get(),
    ]);
})->name('task.index');


Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', [
        'task' =>   $task
    ]);
})->name('task.show');

Route::get('/tasks/{task}', function (Task $task) {

    return view('show', [
        'task' =>   $task
    ]);
})->name('task.show');

Route::fallback(function () {
    return 'Still got somewhere';
});


Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('task.show', [
        'task' => $task->id
    ])->with('success', 'Task created succesfully1');
})->name('task.store');


Route::put('/tasks/${task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('task.show', [
        'id' => $task->id
    ])->with('success', 'Task updated succesfully1');
})->name('task.update');
