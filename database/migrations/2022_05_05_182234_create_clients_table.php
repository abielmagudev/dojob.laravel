<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->string('lastname', 32);
            $table->string('alias', 64)->nullable();
            $table->string('address', 92);
            $table->string('zip_code', 16)->unique();
            $table->string('city', 64)->index();
            $table->string('state', 64)->index();
            $table->string('country', 64);
            $table->string('phone', 32)->index();
            $table->string('email', 40)->index()->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
