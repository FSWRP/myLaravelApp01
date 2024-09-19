<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('spare_parts', function (Blueprint $table) {
        $table->bigIncrements('part_id'); // This creates an unsignedBigInteger column named 'part_id'
        $table->string('part_name');
        $table->integer('amount');
        $table->string('brand');
        $table->string('model');
        $table->string('color');
        $table->float('price');
        $table->integer('year');
        $table->string('type_spare');
        $table->string('image');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *cv
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spare_parts');
    }
}

