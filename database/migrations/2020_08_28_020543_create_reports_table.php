<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('email_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('receiver_addr');
            $table->string('track_code');
            $table->string('status');
            $table->timestamp('open_date')->nullable();
            $table->integer('clics')->default(0);
            $table->timestamps();
            //$table->foreign('email_id')->references('id')->on('emails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
