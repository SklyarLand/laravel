<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $column = request('column') ? request('column') : 'id';
        $direct = request('direct') ? request('direct') : 'desc';
        $page = request('page') ? request('page') : '1';

        $sort = [
            'column' => $column,
            'direct' => $direct,
            'page' => $page
        ];

        $tasks = Task::getTasksPage($sort);

        return view('tasks.index', compact('tasks', 'sort'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function create()
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
        $message = 'Данные о задачах обновлены!';
        $back_url = '/tasks';
        return view('feedback.success', compact('message', 'back_url'));
    }

    public function fail()
    {
        $message = 'Ошибка при попытке изменить данные!';
        $back_url = '/tasks';
        return view('feedback.fail', compact('message', 'back_url'));
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $task = Task::find($id);
        $data = [
            'body' => $request->body,
            'completed' => $request->completed ? 1 : 0,
            'edited' => 1
        ];
        if ($task->where('id', $id)->update($data))
            return redirect('/tasks/success');
        else
            return redirect('/task/fail');
    }
}
