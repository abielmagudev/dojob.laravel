<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Work;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('priority')->default(1);
            $table->enum('status', Work::allStatus())->default(Work::defaultStatus())->index();
            $table->date('scheduled_date');   
            $table->time('scheduled_time');
            $table->date('started_date')->nullable();   
            $table->time('started_time')->nullable();
            $table->date('finished_date')->nullable();   
            $table->time('finished_time')->nullable();
            $table->date('closed_date')->nullable();   
            $table->time('closed_time')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('job_id')->constrained()->restrictOnDelete(); 
            $table->foreignId('client_id')->constrained()->restrictOnDelete();
            $table->foreignId('intermediary_id')->nullable();
            $table->foreignId('crew_id')->nullable();
            $table->timestamps();

            $table->index(
                'scheduled_date',
                'scheduled_time',
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
