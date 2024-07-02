<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dayras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wilaya_id');
            $table->foreign('wilaya_id')
            ->references('id')
            ->on('wilayas')
            ->onDelete('cascade');
            $table->string('ar_name')->nullable();
            $table->string('en_name')->nullable();
            $table->string('zip_code')->nullable();
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
        Schema::dropIfExists('dayras');
    }
}
