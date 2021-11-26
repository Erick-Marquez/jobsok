<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRecommendationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_recommendation', function (Blueprint $table) {

            $table->bigInteger('quantity');

            $table->foreignId('user_id') 
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('profession_id') 
                ->constrained('professions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['user_id', 'profession_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_recommendation');
    }
}
