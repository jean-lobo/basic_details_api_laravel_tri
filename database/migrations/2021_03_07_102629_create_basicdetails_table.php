<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basicdetails', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
           $table->date('dob');
            $table->string('phone')->unique();
           $table->string('email')->unique();
           $table->string('password');
           $table->MediumText('address');
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
        Schema::dropIfExists('basicdetails');
    }
}
