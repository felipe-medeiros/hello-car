@extends('layout')

@section('content')
    <br><h3 class="text-center">Lista de Veículos</h3><br>
    <a href="{{ route('cars.create') }}" class="btn btn-info">Novo Veículo</a><br><br>
    <table class="table table-hover text-center">
        <thead>
            <td>Modelo</td>
            <td>Placa</td>
            <td>Fabricante</td>
            <td>Situação</td>
            <td>Data da Compra</td>
            <td>Data da Venda</td>
            <td></td>
            <td></td>
        </thead>
        <tbody>
            @if($cars)
                @foreach($cars as $car)
                    @if(!strcmp($car->situacao, 'Vendido'))
                        <tr class="table-success">
                    @else
                        <tr>
                    @endif
                    <td>{{ $car->nome }}</td><td>{{ $car->placa }}</td><td>{{ $car->fabricante }}</td>
                    <td>{{ $car->situacao }}</td><td>{{ $car->data_compra }}</td><td>{{ $car->data_venda ? $car->data_venda : '-' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>Nenhum veículo cadastrado.</tr>
            @endif
        </tbody>
    </table>

@endsection

