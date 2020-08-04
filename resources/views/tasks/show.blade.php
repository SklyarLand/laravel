@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1>Задача №{{ $task->id }}</h1>
        <hr>
        {!! Form::open(['url' => '/tasks/'.$task->id.'/update']) !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    {!! Form::label('name', 'Автор:') !!}<br>
                    {!! Form::text('name', $task->name, ['size' => '50', 'required']) !!}
                </div>
                <div class="container mt-20">
                    {!! Form::label('email', 'E-mail автора:') !!}<br>
                    {!! Form::email('email', $task->email, ['size' => '50', 'required']) !!}
                </div>
                <div class="container mt-20">
                    {!! Form::label('completed', 'Выполнено:') !!}
                    {!! Form::checkbox('completed', 1,$task->completed) !!}
                </div>
                <div class="container ">
                    {!! Form::label('edited', 'Отредактировано администратором:') !!}
                    {!! Form::checkbox('edited', '', $task->edited, ['disabled']) !!}
                </div>
                @guest
                    <div class="alert alert-info mt-20" role="alert">
                        <p>Редактировать задачи могут только администраторы!</p>
                    </div>
                @else
                    @if (Auth::user()->is_admin)
                        <div class="container mt-20">
                            {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                        </div>
                    @endif
                @endguest
            </div>
            <div class="container col-lg-6">
                {!! Form::label('body', 'Текст задачи:') !!}
                {!! Form::textarea('body', $task->body, ['cols' => '60', 'rows' => '15', 'required']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        <a href="/tasks">
            <button type="button" class="btn btn-dark">< Назад</button>
        </a>
    </div>
@endsection

