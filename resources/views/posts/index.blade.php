@extends('layouts.app')

@section('content')
    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section>

      <div id="app">
        <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
                  @foreach ($posts as $post)
                      <post-component
                          title="{{ $post->title }}"
                          body="{{ $post->body }}"
                          date="
                              @if ($currentDate->diffInDays($post->updated_at))
                                  {{ $post->created_at->isoFormat('M-D-YYYY') }}
                              @else
                                  {{ $post->created_at->isoFormat('h:mm:ss') }}
                              @endif"
                          id="{{ $post->id }}"
                      ></post-component>
                  @endforeach
              </div>
            </div>
        </div>
      </div>

    </main>
@endsection
