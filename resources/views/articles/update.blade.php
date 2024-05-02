@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="GET" action="http://127.0.0.1:8000/cars/update-store/{{ $article->id }}">
        <input type = "text" name="title" value="{{ $article->title }}">
        <input type = "text" name="model" value="{{ $article->body }}">
        <button type="submit">Отправить</button>
    </form>
@endsection
