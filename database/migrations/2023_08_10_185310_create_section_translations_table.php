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
        Schema::create('section_translations', function (Blueprint $table) {

            // mandatory fields
            $table->id();
            $table->string('locale')->index(); //insert ar,en
                    // Foreign key to the main model
           
            $table->unique(['section_id', 'locale']);
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();;

            // Actual fields you want to translate
            $table->string('name');
            
            $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_translations');
    }
};
