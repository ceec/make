<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectsteps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->string('name');      
            $table->text('content');            
            $table->datetime('started_at');
            $table->datetime('completed_at');
            $table->integer('complete');
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
         Schema::dropIfExists('projectsteps');
    }
}
