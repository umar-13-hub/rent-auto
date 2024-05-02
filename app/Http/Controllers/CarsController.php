<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarForm;
use App\Http\Requests\UpdateCarForm;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController
{
    public function index(Request $request)
    {
        // DESC - порядок по возрастанию
        // ASK - порядок по убываванию
        $model = Cars::where('price', '>',
            $request->filled('price_from') ? $request->input('price_from') : 0
        )
            ->orderBy(
                $request->filled('sort') ? $request->input('sort') : 'id'
            , 'ASC')
            ->get();
        return view('cars.index', [
            'cars' => $model
        ]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(CreateCarForm $request)
    {
        $car = Cars::create($request->all());
        return redirect()->back()->with('alert', 'Ваша машина добавлена: ' . $car->brand);

    }
    public function update(int $id,Request $request)
    {
        $model = Cars::find($id);
        if (is_null($model)) {
            return redirect()->route('cars-home')->with('error', 'Такой машины нет.');
        }
        return view('cars.update', [
            'car' => Cars::find($id)
        ]);
    }

    public function updateStore(int $id, UpdateCarForm $request)
    {
        $model = Cars::where('id', $id)
            ->update(
                $request->all()
            );
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        // DELETE FROM cars WHERE id = $request->input('id')
        Cars::destroy($request->input('id'));
        return redirect()->back();
    }


    public function show(int $id)
    {
        $car = Cars::find($id);
        return view('cars.show', [
            'car'=>$car
        ]);
    }
}
