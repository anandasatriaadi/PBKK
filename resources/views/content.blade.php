@extends('layouts.template')

@section('title')
    {{ $article->title }}
@endsection

@section('container')
<article>
    <h3>{{ $article->title }}                   
    </h3>
    <h6>By: {{ $article->user->name}} in <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a></h6>
    <p class="mb-0"> {!! $article->body !!}
    </p>
</article>
@endsection
