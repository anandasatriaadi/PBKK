@extends('layouts.template')

@section('title')
    {{ $category }}
@endsection

@section('container')
    <h1>Category: {{ $category }}</h1>
    <hr/>
    @foreach($articles as $article)
        <article class="mb-5 p-4 rounded-3 shadow" style="background-color: rgba(255, 255, 255, 0.25)">
            <h3>
                <a href="/article/{{ $article->slug }}" class="link-dark">
                {{ $article->title }}
                </a>                    
            </h3>
            <h6>By: {{ $article->user->name }}</h6>
            <p>{{ $article->excerpt }}</p>
        </article>
    @endforeach
@endsection
