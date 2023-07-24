<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('package_id');
            $table->string('truck_number')->nullable(); 
            $table->foreign('truck_number')->references('truck_number')->on('trucks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('package_number')->unique();
            $table->string('receiver_name');
            $table->string('destination');
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
        Schema::disableForeignKeyConstaints();
        Schema::table('packages', function(Blueprint $table){
            $table->dropForeign(['truck_number']);
        });

        Schema::dropIfExists('packages');
        Schema::enableForeignKeyConstraints();
    
    }
}