@extends('layout')

@section('content')
    <br><h3 class="text-center">Lista de Veículos</h3><br>
    <form method="GET" action="{{ route('cars.index') }}">
        <div class="form-row">
            <div class="col">
                <label for="situacao">Situação:</label>
                <select id="situacao" name="situacao" class="form-control">
                    <option value="">Selecione</option>
                    <option value="Em uso">Em uso</option>
                    <option value="Em manutenção">Em manutenção</option>
                    <option value="Vendido">Vendido</option>
                </select>
            </div>

            <div class="col">
                <label for="data_de">Data da Compra De:</label>
                <input id="data_de" name="data_de" type="date" class="form-control">
            </div>

            <div class="col">
                <label for="data_a">Data da Compra A:</label>
                <input id="data_a" name="data_a" type="date" class="form-control">
            </div>
        </div><br>
        <button class="btn btn-success float-right" type="submit">
            <span class="glyphicon glyphicon-filter"></span> Filtrar</button>
    </form><br>
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
        </thead>
        <tbody>
            @forelse($cars as $car)
                @if(!strcmp($car->situacao, 'Vendido'))
                    <tr class="table-success">
                @else
                    <tr>
                @endif
                <td>{{ $car->nome }}</td><td>{{ $car->placa }}</td><td>{{ $car->fabricante }}</td>
                <td>{{ $car->situacao }}</td><td>{{ $car->data_compra }}</td><td>{{ $car->data_venda ? $car->data_venda : '-' }}</td>
                <td><a href="{{ route('cars.edit', $car->id) }}" class="btn btn-secondary">Editar</a></td></tr>
            @empty
                <tr><td colspan="8"><h6>Nenhum veículo encontrado.</h6></td></tr>
            @endforelse
        </tbody>
    </table>
@endsection

