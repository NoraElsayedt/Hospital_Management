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
        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index(); //insert ar,en
            // Foreign key to the main model
 
    $table->unique(['service_id', 'locale','name']);
    $table->foreignId('service_id')->constrained()->cascadeOnDelete();


    // Actual fields you want to translate
    $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_translations');
    }
};
