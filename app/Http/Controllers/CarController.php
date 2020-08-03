<?php

namespace App\Http\Controllers;

use App\Car;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $situacao = $request->isMethod('GET') ? $request->situacao : null;

        $cars = Car::veiculosModelosFiltro($situacao, $request->data_de, $request->data_a);

        return view('veiculo.lista')->with(['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculo.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = Type::firstOrNew([
            'nome'       => strtoupper($request->nome),
            'fabricante' => $request->fabricante
        ]);

        $type->save();

        $car = Car::firstOrNew([
            'placa' => strtoupper($request->placa)
        ]);

        $car->fill([
            'situacao'    => $request->situacao,
            'data_compra' => $request->data_compra,
            'data_venda'  => $request->data_venda
        ]);

        $car->type()->associate($type);

        $car->save();

        return $this->index($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($carId)
    {
        $car = Car::veiculoModelo($carId);

        return view('veiculo.form')->with(['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        return $this->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
