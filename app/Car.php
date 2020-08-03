<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public static function veiculosModelos()
    {
        return DB::table('cars')
                ->select('cars.*','types.*')
                ->leftJoin('types', 'cars.type_id', '=', 'types.id')
                ->orderBy('types.nome')
                ->get();
    }
}
