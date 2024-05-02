
@section('content')
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Марки автомобиля
                </th>
                <th scope="col" class="px-6 py-3">
                    Модель
                </th>
                <th scope="col" class="px-6 py-3">
                    Описание
                </th>
                <th scope="col" class="px-6 py-3">
                    Цена
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <a href="{{route('cars.show', $car->id)}}" class="text-blue-900 hover:border-b">
                            {{ $car->brand }}</a>
                    </th>
                    <td class="px-6 py-4">
                        {{ $car->model }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $car->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $car->price }}₽
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
