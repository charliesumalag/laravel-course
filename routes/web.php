<?php

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

Route::get('/tasks/{id}', function ($id) {

    return view('show', [
        'task' =>   Task::findOrFail($id),
    ]);
})->name('task.show');

Route::fallback(function () {
    return 'Still got somewhere';
});


Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required | max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('task.show', [
        'id' => $task->id
    ]);
})->name('task.store');
