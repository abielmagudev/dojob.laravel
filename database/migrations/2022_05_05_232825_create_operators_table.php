<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32)->index();
            $table->string('lastname', 32)->index();
            $table->string('phone', 32)->unique()->index();
            $table->string('email', 40)->unique()->index();
            $table->date('birthdate')->nullable();
            $table->string('position', 64)->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_available')->default(true)->index();
            $table->foreignId('crew_id')->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('operators');
    }
}
