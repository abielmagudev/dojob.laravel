<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiPluginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_plugins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalog_id')->constrained('api_catalogs');
            $table->string('name', 80)->unique();
            $table->text('description');
            $table->text('default_settings')->nullable();
            $table->string('version', 8);
            $table->unsignedDecimal('price')->nullable(); // null is free
            $table->string('hashed', 16)->unique();
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
        Schema::dropIfExists('api_plugins');
    }
}
