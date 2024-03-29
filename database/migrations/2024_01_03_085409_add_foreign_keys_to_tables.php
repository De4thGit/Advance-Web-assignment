<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('bu_id')->references('id')->on('business_units');
            $table->foreign('lead_developer_id')->references('id')->on('developers');
        });
    
        Schema::table('progress_reports', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('business_unit_id')->references('id')->on('business_units');
        });
    }
    
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['bu_id']);
            $table->dropForeign(['lead_developer_id']);
        });
    
        Schema::table('progress_reports', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['business_unit_id']);
        });
    }
};
