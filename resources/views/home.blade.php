@extends('layouts.app')

@section('content')
    <div id="app">
        <home user-id={{ Auth::user()->id }}></home>
    </div>
@endsection
