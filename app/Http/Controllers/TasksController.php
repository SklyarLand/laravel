<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::incomplete();
        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function  create()
    {
        return view('tasks.create');
    }

    public function publish(Request $request)
    {
        $input = $request->all();
        if (Task::create($input))
            return redirect('/tasks/success');
        else
            return redirect('/task/fail');
    }

    public function success()
    {
        $message = 'Новая задача успешно добавлена!';
        $back_url = '/tasks';
        return view('feedback.success', compact('message', 'back_url'));
    }

    public function fail()
    {
        $message = 'Ошибка при добавлении!';
        $back_url = '/tasks';
        return view('feedback.fail', compact('message', 'back_url'));
    }
}
