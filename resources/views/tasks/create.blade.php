@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h1>Новая задача</h1>
    <hr>
    {!! Form::open(['url' => '/tasks/publish']) !!}
    @guest
        <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    {!! Form::label('name', 'Введите свое имя:') !!}<br>
                    {!! Form::text('name', 'имя', ['size' => '50', 'required']) !!}
                </div>
                <div class="container mt-20">
                    {!! Form::label('email', 'Введите свой e-mail:') !!}<br>
                    {!! Form::email('email', 'alex@examle.com', ['size' => '50', 'required']) !!}
                </div>
                <div class="container mt-20">
                    {!! Form::submit('Подтвердить', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            <div class="container col-lg-6">
                {!! Form::label('body', 'Введите текст задачи:') !!}
                {!! Form::textarea('body', '', ['cols' => '60', 'rows' => '15', 'required']) !!}
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    {!! Form::label('name', 'Введите свое имя:') !!}<br>
                    {!! Form::text('name', Auth::user()->name, ['size' => '50', 'required', 'readonly']) !!}
                </div>
                <div class="container mt-20">
                    {!! Form::label('email', 'Введите свой e-mail:') !!}<br>
                    {!! Form::email('email', Auth::user()->email, ['size' => '50', 'required', 'readonly']) !!}
                </div>
                <div class="container mt-20">
                    {!! Form::submit('Подтвердить', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            <div class="container col-lg-6 row">
                {!! Form::label('body', 'Введите текст задачи:') !!}
                {!! Form::textarea('body', '', ['cols' => '60', 'rows' => '15', 'required', 'class' => 'w-75']) !!}
            </div>
            <div class="d-none">
                {!! Form::text('author_id', Auth::user()->id) !!}
            </div>
        </div>
    @endguest
    {!! Form::close() !!}
    <a href="/tasks">
        <button type="button" class="btn btn-dark">< Назад</button>
    </a>
</div>
@endsection
