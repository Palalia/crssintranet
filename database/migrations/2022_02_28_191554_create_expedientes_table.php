<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('campus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('url_maps');
            $table->Integer('cantidad_personal')->nullable();
            $table->Integer('sueldo_autorizado');
            $table->foreignId('idestado')->references('id')->on('estados');
            $table->foreignId('idcliente')->references('id')->on('clientes');
            $table->timestamps();
        });
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->date('fecha_nacimiento');
            $table->Integer('edad');
            $table->string('curp');
            $table->string('nacionalidad');
            $table->float('sueldo_diario')->nullable();
            $table->string('foto')->nullable();
            $table->string('cuip')->nullable();
            $table->string('horario')->nullable();
            $table->enum('status',['pospecto','contratado','baja']);//prospecto,contratado,baja
            $table->foreignId('idcampus')->references('id')->on('campus')->nullable();
            $table->foreignId('idpuesto')->references('id')->on('roles')->nullable();               
            $table->foreignId('idestado')->references('id')->on('estados')->nullable();
            $table->foreignId('idcliente')->references('id')->on('clientes')->nullable();   
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
        Schema::dropIfExists('expedientes');
        Schema::dropIfExists('campus');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('clientes');
    }
}
