<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSeoFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opinion', function (Blueprint $table) {
            $table->foreignId('meta_title')->nullable()->constrained('translates')->cascadeOnDelete();
            $table->foreignId('meta_description')->nullable()->constrained('translates')->cascadeOnDelete();
        });
        Schema::table('technology', function (Blueprint $table) {
            $table->foreignId('meta_title')->nullable()->constrained('translates')->cascadeOnDelete();
            $table->foreignId('meta_description')->nullable()->constrained('translates')->cascadeOnDelete();
        });
        Schema::table('analytics', function (Blueprint $table) {
            $table->foreignId('meta_title')->nullable()->constrained('translates')->cascadeOnDelete();
            $table->foreignId('meta_description')->nullable()->constrained('translates')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
