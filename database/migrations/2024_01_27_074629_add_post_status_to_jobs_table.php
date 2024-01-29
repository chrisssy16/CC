<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


    /**
     * Run the migrations.
     */
    class AddPostStatusToJobsTable extends Migration
    {
        public function up()
        {
            Schema::table('jobs', function (Blueprint $table) {
                $table->enum('post_status', ['not complete', 'complete'])->default('not complete');
            });
        }
    
        public function down()
        {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropColumn('post_status');
            });
        }
};

