@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1>Список задач</h1>
        <div id="table" class='container'>
            <div class="row bg-dark text-light table-header">
                <?php
                use Illuminate\Http\Request;

                function getArrowhead(string $column)
                {
                    $arrowhead = '';
                    if (request('column') === $column) {
                        $arrowhead = '˅';
                        if (request('direct') === 'asc') {
                            $arrowhead = '˄';
                        }
                    }
                    return $arrowhead;
                }

                function getPageParam(string $column)
                {
                    $direct = (request('column') === $column && request('direct') === 'desc') ? 'asc' : 'desc';
                    return ['column' => $column, 'direct' => $direct, 'page' => request('page')];
                }
                ?>
                <div class="col-md-1"><a href="{{ route('tasks.index', getPageParam('id')) }}"># {{ getArrowhead('id') }}</a></div>
                <div class="col-md-2"><a href="{{ route('tasks.index', getPageParam('name')) }}">Пользователь {{ getArrowhead('name') }}</a></div>
                <div class="col-md-2"><a href="{{ route('tasks.index', getPageParam('email')) }}">E-mail {{ getArrowhead('email') }}</a></div>
                <div class="col-md-4"><a href="{{ route('tasks.index', getPageParam('body')) }}">Описание {{ getArrowhead('body') }}</a></div>
                <div class="col-md-1">Статус</div>
                <div class="col-md-2">Редактировано</div>
            </div>
            @foreach ($tasks as $task)
                <a href="/tasks/{{$task->id}}">
                    <div class="row task-row">
                        <div class="col-md-1 border">{{ $task->id }}</div>
                        <div class="col-md-2 border">{{ $task->name }}</div>
                        <div class="col-md-2 border">{{ $task->email }}</div>
                        <div class="col-md-4 border">{{ $task ->body }}</div>
                        <div class="col-md-1 border" style='text-align: center;' ><input type='checkbox' disabled {{ $task->completed ? 'checked' : '' }}></div>
                        <div class="col-md-2 border" style='text-align: center;' ><input type='checkbox' disabled {{ $task->edited ? 'checked' : '' }}></div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="container mt-20">
            <div class="row d-flex justify-content-between">
                <a href="/tasks/create">
                    <button type="button" class="btn btn-primary">Создать задачу</button>
                </a>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
@endsection
