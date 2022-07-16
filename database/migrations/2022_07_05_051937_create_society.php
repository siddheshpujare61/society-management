<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociety extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->date('established_date')->nullable();
            $table->string('developer')->nullable();
            $table->string('consultant')->nullable();
            $table->string('agency')->nullable();
            $table->string('uploaded_document')->nullable();
            $table->string('building_info')->nullable();
            $table->tinyInt('status')->nullable(false);
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
        Schema::dropIfExists('society');
    }
}
