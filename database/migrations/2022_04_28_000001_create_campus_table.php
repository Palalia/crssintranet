<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'campus';

    /**
     * Run the migrations.
     * @table campus
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('cliente_id');
            $table->string('nombre', 190);
            $table->string('direccion', 140);
            $table->string('colonia', 140);
            $table->string('estado', 20);
            $table->string('telefno', 13)->nullable();
            $table->string('url_maps', 140)->nullable();
            $table->unsignedInteger('vacantes');
            $table->string('nombre_representante', 140)->nullable();
            $table->string('telefono_representante', 13)->nullable();
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
        Schema::dropIfExists($this->tableName);
    }
}
