<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionTechnicianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession_technician', function (Blueprint $table) {

            $table->foreignId('profession_id') 
                ->constrained('professions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('technician_id') 
                ->constrained('technicians')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['profession_id', 'technician_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profession_technician');
    }
}
