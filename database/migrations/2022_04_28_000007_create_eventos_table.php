<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'eventos';

    /**
     * Run the migrations.
     * @table eventos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('reportes_id');
            $table->tinyInteger('tipo')->comment('0:novedad
1:insidencia');
            $table->string('area', 45)->nullable();
            $table->string('descripcion', 140)->nullable();
            $table->unsignedTinyInteger('nivel')->comment('0:sin gravedad
1:baja gravedad
2:media gravedad
3:alta gravedad
');
            $table->integer('numero_rondin')->default('0')->comment('0:sin rondin');
            $table->string('foto', 140)->nullable();
            $table->time('hora')->nullable();

            $table->index(["reportes_id"], 'fk_eventos_reportes1_idx');


            $table->foreign('reportes_id', 'fk_eventos_reportes1_idx')
                ->references('id')->on('reportes')
                ->onDelete('no action')
                ->onUpdate('no action');
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
