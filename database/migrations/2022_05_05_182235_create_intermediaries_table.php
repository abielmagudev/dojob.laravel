<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntermediariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intermediaries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40)->unique();
            $table->string('alias', 16)->unique();
            $table->string('contact', 40)->nullable();
            $table->string('phone', 32)->unique();
            $table->string('email', 40)->unique();
            $table->text('notes')->nullable();
            $table->boolean('is_available')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intermediaries');
    }
}
