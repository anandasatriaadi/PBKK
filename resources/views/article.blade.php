@extends('layouts.template')

@section('title')
    Article
@endsection

@section('container')
    <h1>{{  $title  }}</h1>
    <hr/>
    @foreach($articles as $article)
        <article class="mb-4 p-4 rounded-3 shadow" style="background-color: rgba(255, 255, 255, 0.25)">
            <h3>
                <a href="/article/{{ $article->slug }}" class="link-dark">
                    {{ $article->title }}
                </a>
            </h3>
            <p class="px-2 rounded-3 mb-2 d-inline-block text-capitalize" style="background-color: rgba(0, 172, 252, 0.15)">
                {{ $article->category->name }}
            </p>
            <div class="ps-2">
                <h6>By: {{ $article->user->name }}</h6>
                <p>{{ $article->excerpt }}</p>
            </div>
        </article>
    @endforeach
@endsection
