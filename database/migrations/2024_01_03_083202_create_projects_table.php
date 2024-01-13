<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bu_id');
            $table->string('title', 255);
            $table->text('description');
            $table->date('start_date');
            $table->integer('duration');
            $table->date('end_date');
            $table->string('status', 50)->nullable();;
            $table->unsignedBigInteger('lead_developer_id')->nullable(); // Make it nullable
            $table->string('platform', 50);
            $table->string('deployment_type', 50);
            $table->string('development_methodology', 255);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};