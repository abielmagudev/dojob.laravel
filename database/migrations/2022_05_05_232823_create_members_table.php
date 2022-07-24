<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('lastname')->index();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->date('birthdate')->nullable();
            $table->text('notes')->nullable();
            $table->string('position')->nullable();
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
        Schema::dropIfExists('members');
    }
}
