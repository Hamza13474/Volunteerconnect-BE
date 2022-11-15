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
        Schema::create('ngo', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('region');
            $table->string('postal_code'); 
            $table->string('country');
            $table->string('phone');
            $table->string('mission_statement');
            $table->string('organizational_description');
            $table->string('intrest');
            $table->string('image');    
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
        Schema::dropIfExists('ngo');
    }
};
