<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentnumbers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('parents');
            $table->string('title');
            $table->text('alt_number');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('parentnumbers');
    }
}
