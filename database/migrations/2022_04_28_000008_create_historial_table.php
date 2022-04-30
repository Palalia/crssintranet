<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'historial';

    /**
     * Run the migrations.
     * @table historial
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            $table->string('valor_actual', 100);
            $table->string('valor_anterior', 100);
            $table->string('tabla', 45);
            $table->unsignedInteger('registro_id');
            $table->string('comentarios', 250)->nullable();

            $table->index(["usuario_id"], 'fk_historial_users_id_idx');


            $table->foreign('usuario_id', 'fk_historial_users_id_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
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
