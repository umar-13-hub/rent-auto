@extends('layouts.app')

@section('content')
    <div class="my-10 flex justify-between">
        <div class="">
            <span class="p-1.5 bg-blue-300 mb-5"> {{ $article->$category->name }}</span>
            <h1 class="text-2xl"> {{ $article->title}}</h1>
            <div class="flex gap-5">
            <span class="text-sm">
                    Просмотры:
                    {{ $article->view_count }}
                </span>
                <span class="text-sm">
                    Лайки:
                    {{ $article->like }}
            </span>
            </div>
            <div class="mt-10">
                {{ $article->body }}
            </div>
        </div>
        @if(! is_null($article->token))
            <div class="border p-5">
                <h1 class="text-xl">Марка: {{ $article->car->brand }}</h1>
                <h1>Модель: {{ $article->car->model }}</h1>
                <p class="text-md">Цена: {{ $article->car->price }}</p>
            </div>
        @endif
    </div>
@endsection
