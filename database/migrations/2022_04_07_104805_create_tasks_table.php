<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('text', 200);
            $table->date('startdate');
            $table->date('enddate');
            $table->foreignId('user_id')->constrained()
               ->onUpdate('no action')->onDelete('no action')->nullable();
            $table->foreignId('project_id')->constrained()
               ->onUpdate('cascade')->onDelete('cascade');
               $table->foreignId('activity_id')->constrained()
                 ->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('tasks');
    }
}
