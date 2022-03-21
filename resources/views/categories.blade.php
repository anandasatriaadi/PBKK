@extends('layouts.template')

@section('title')
    Categories
@endsection

@section('container')
    <h1>Article Categories</h1>
    <hr/>
    @foreach($categories as $category)
        <ul class="mb-3 py-2 px-4 rounded-3 shadow-sm"  style="background-color: rgba(255, 255, 255, 0.25)">
            <li style="list-style: none">
                <h3 class="text-capitalize"><a class="link-dark" href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h3>
            </li>
        </ul>
    @endforeach
@endsection
