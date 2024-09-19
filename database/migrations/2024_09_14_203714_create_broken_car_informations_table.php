<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_broken_car_informations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokenCarInformationsTable extends Migration
{
    public function up()
    {
        Schema::create('broken_car_informations', function (Blueprint $table) {
            $table->id('car_id')->unsigned(); // Use unsigned for compatibility
            $table->unsignedBigInteger('part_id'); // Match the type
            $table->string('fault_description');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('part_id')->references('part_id')->on('spare_parts')
                  ->onDelete('cascade'); // Optionally, set up cascading delete
        });
    }

    public function down()
    {
        Schema::dropIfExists('broken_car_informations');
    }
}
