<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reportes';

    /**
     * Run the migrations.
     * @table reportes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('campus_id');
            $table->unsignedInteger('personal_id');
            $table->timestamps();
            $table->unique(["id"], 'id_UNIQUE');

            $table->index(["personal_id"], 'fk_reportes_personal_idx');


            $table->foreign('personal_id', 'fk_reportes_personal_idx')
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
