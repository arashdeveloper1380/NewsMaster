<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->integer('type')->nullable();
           $table->integer('category')->nullable();
           $table->integer('subcategory')->nullable();
           $table->integer('district')->nullable();
           $table->integer('subdistrict')->nullable();
           $table->integer('post')->nullable();
           $table->integer('social')->nullable();
           $table->integer('prayer')->nullable();
           $table->integer('livetv')->nullable();
           $table->integer('notice')->nullable();
           $table->integer('gallery')->nullable();
           $table->integer('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
