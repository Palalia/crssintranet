<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrevistasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'entrevistas';

    /**
     * Run the migrations.
     * @table entrevistas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('personal_id1');
            $table->unsignedInteger('estatura');
            $table->unsignedInteger('peso')->nullable();
            $table->time('hora_inicio_turno');
            $table->time('hora_fin_turno');
            //$table->dateTime('fecha_entrevista');
            $table->timestamps();
            $table->unsignedTinyInteger('casa_propia');
            $table->integer('gastos_mensuales');
            $table->unsignedTinyInteger('credito_infonavit');
            $table->text('experiencia');
            $table->string('motivo_interes');
            $table->time('duracion_traslado');
            $table->string('sintomas_covid');
            $table->unsignedTinyInteger('vacuna')->comment('0:no vacunado
1:1
2:2
3:3
4:4');
            $table->string('prueva_covid');
            $table->text('enfermedad');
            $table->text('discapacidad');
            $table->unsignedTinyInteger('cartilla_militar');
            $table->text('antecedentes');
            $table->text('antidoping_realizado');
            $table->unsignedTinyInteger('disposicion_antidoping');
            $table->text('grado_estudios');
            $table->string('documentos_existentes', 250)->nullable();
            $table->string('documentos_pendientes', 250)->nullable();
            $table->unsignedTinyInteger('posibilidad_prospecto')->default('0')->comment('0:rechazado
1:posible
2:bastante
');
            $table->string('descripcion_posibilidad_prospecto')->nullable();
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
