<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('reference',20);
            $table->string('slug',20);
            $table->string('address');
            $table->string('postal_code',10);
            $table->string('city',70);
            $table->string('state',50);
            $table->smallInteger('square_meters')->unsigned();
            $table->tinyInteger('rooms')->unsigned()->nullable();
            $table->string('type',50);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_avaible')->default(1);
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
        Schema::dropIfExists('houses');
    }
};
