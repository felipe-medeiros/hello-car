<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public static function veiculoModelo($id)
    {
        $select = self::veiculoModeloJoin();

        return $select->where('cars.id', '=', $id)->first();
    }

    public static function veiculosModelosFiltro(
        $situacao     = null,
        $dataCompraDe = null,
        $dataCompraA  = null
    )
    {
        $select = self::veiculoModeloJoin();

        if ($situacao) {
            $select->where('cars.situacao', '=', $situacao);
        }

        if ($dataCompraDe) {
            $dataCompra = $dataCompraA ? $dataCompraA : Carbon::now();

            $select->whereBetween('data_compra', [date($dataCompraDe), date($dataCompra)]);
        }

        return $select->get();
    }

    protected static function veiculoModeloJoin()
    {
        return DB::table('cars')
            ->select('cars.*','types.*')
            ->leftJoin('types', 'cars.type_id', '=', 'types.id')
            ->orderBy('types.nome');
    }
}
