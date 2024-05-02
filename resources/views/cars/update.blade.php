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
<form method="GET" action="http://127.0.0.1:8000/cars/update-store/{{ $car->id }}">
    <input type="text" name="brand" value="{{ $car->brand }}">
    <input type = "text" name="model" value="{{ $car->model }}">
    <input type = "text" name="description" value="{{ $car->description }}">
    <input type = "text" name="price" value="{{ $car->price }}">
    <button type="submit">Отправить</button>
</form>
@endsection
