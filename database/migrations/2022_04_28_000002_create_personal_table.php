<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'personal';

    /**
     * Run the migrations.
     * @table personal
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('campus_id');
            $table->unsignedInteger('salario');
            $table->unsignedTinyInteger('tipo_salario')->comment('0:diario 
1:semanal
2:quincenal
3:mensual');
            $table->string('puesto', 45);
            $table->unsignedTinyInteger('status')->comment('0:baja
1:prospecto
2:contratado
3:rechazado
');
            $table->string('observacion_status')->nullable();
            $table->string('nombre', 45);
            $table->string('apellido_paterno', 45);
            $table->string('apellido_materno', 45);
            $table->string('direccion', 45);
            $table->string('municipio', 45);
            $table->string('colonia', 45);
            $table->string('estado', 45);
            $table->string('telefono', 13)->nullable();
            $table->timestamps();
            $table->unique(["id"], 'id_UNIQUE');

            $table->index(["campus_id"], 'fk_personal_campus1_idx');


            $table->foreign('campus_id', 'fk_personal_campus1_idx')
                ->references('id')->on('campus')
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
