<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('placa', 7)->unique();
            $table->date('data_compra');
            $table->date('data_venda')->nullable();
            $table->enum('situacao', ['Em uso', 'Em manutenção', 'Vendido']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
