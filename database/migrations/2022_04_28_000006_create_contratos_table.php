<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contratos';

    /**
     * Run the migrations.
     * @table contratos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('personal_id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('solicitud_empleo', 45)->nullable();
            $table->string('formato_crss', 45)->nullable();
            $table->string('ine', 45)->nullable();
            $table->string('curp', 18)->nullable();
            $table->string('foto_curp', 45)->nullable();
            $table->string('rfc', 14)->nullable();
            $table->string('foto_rfc', 45)->nullable();
            $table->string('nss', 11)->nullable();
            $table->string('foto_nss', 45)->nullable();
            $table->string('certificado_estudios', 45)->nullable();
            $table->string('comprobante_domicilio', 45)->nullable();
            $table->string('acta_nacimiento', 45)->nullable();
            $table->string('carta_antecedentes', 45)->nullable();
            $table->string('carta_recomendacion1', 45)->nullable();
            $table->string('carta_recomendacion2', 45)->nullable();
            $table->string('carta_recomendacion3', 45)->nullable();
            $table->string('cartilla_militar', 45)->nullable();

            $table->unique(["curp"], 'curp_UNIQUE');

            $table->unique(["nss"], 'nss_UNIQUE');

            $table->index(["personal_id"], 'fk_contratos_personal_id_idx');
            $table->timestamps();


            $table->foreign('personal_id', 'fk_contratos_personal_id_idx')
                ->references('id')->on('personal')
                ->onDelete('restrict')
                ->onUpdate('cascade');
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
