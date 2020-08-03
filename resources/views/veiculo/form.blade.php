@extends('layout')

@section('content')
    <br><h3 class="text-center">Novo Veículo</h3><br>
    <form method="POST" action="@isset($car) {{ route('cars.update', $car->id) }} @else {{ route('cars.store') }} @endisset">
        @isset($car) @method('PUT') @endisset
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="placa">Placa*:</label>
                <input id="placa" name="placa" class="form-control" type="text" maxlength="7" required
                @isset($car) value="{{ $car->placa }}" readonly @endisset>
            </div>

            <div class="col">
                <label for="nome">Modelo*:</label>
                <input id="nome" name="nome" class="form-control" type="text" maxlength="50" required
                @isset($car) value="{{ $car->nome }}" @endisset>
            </div>

            <div class="col">
                <label for="fabricante">Fabricante*:</label>
                @isset($car)
                    <input id="fabricante" name="fabricante" class="form-control" type="text"
                           readonly required value="{{ $car->fabricante }}">
                @else
                    <select id="fabricante" name="fabricante" class="form-control" required>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="Fiat">Fiat</option>
                        <option value="VW">VW</option>
                    </select>
                @endisset
            </div>
        </div><br>

        <div class="form-row">
            <div class="col">
                <label for="situacao">Situação*:</label>
                <select id="situacao" name="situacao" class="form-control" required>
                    <option value="Em uso">Em uso</option>
                    <option value="Em manutenção">Em manutenção</option>
                    <option value="Vendido">Vendido</option>
                </select>
            </div>

            <div class="col">
                <label for="data_compra">Data da Compra*:</label>
                <input id="data_compra" name="data_compra" type="date" class="form-control" required
                    @isset($car) value="{{ $car->data_compra }}" @endisset>
            </div>

            <div class="col">
                <label for="data_venda">Data da Venda:</label>
                <input id="data_venda" name="data_venda" type="date" class="form-control"
                       @isset($car) value="{{ $car->data_venda }}" @endisset>
            </div>
        </div><br>
        <a href="{{ route('cars.index') }}" class="btn btn-info">Voltar</a>
        <button class="btn btn-success" type="submit">@isset($car) Alterar @else Cadastrar @endisset</button>
    </form>
@endsection

