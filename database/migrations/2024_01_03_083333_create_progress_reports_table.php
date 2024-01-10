<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressReportsTable extends Migration
{
    public function up()
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->date('date_of_progress');
            $table->string('progress_status', 50);
            $table->text('progress_description');
            $table->timestamps();
            $table->softDeletes(); 

        });
    }

    public function down()
    {
        Schema::dropIfExists('progress_reports');
    }
};