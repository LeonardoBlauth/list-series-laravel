<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodiosTable extends Migration
{
    public function up(): void
    {
        Schema::create('episodios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');

            $table->unsignedInteger('temporada_id');
            $table->foreign('temporada_id')
                ->references('id')
                ->on('temporadas');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('episodios');
    }
}
