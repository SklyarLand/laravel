@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/feedback.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <h1>Операция провалена</h1>
            <p>{{ $message }}</p>
        </div>
        <a href="{{ $back_url }}"><button type="button" class="btn btn-dark">Назад</button></a>
    </div>
@endsection
