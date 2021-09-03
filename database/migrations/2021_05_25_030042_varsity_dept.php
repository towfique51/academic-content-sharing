<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VarsityDept extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varsity_dept', function (Blueprint $table) {

            $table->unsignedBigInteger('varsity_id');
        
            $table->unsignedBigInteger('dept_id');
        
            $table->foreign('varsity_id')->references('id')->on('varsities')->onDelete('cascade');
        
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('varsity_dept');
    }
}
