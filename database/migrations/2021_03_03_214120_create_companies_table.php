<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('package_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('column_1')->nullable();
            $table->string('column_2')->nullable();
            $table->string('column_3')->nullable();
            $table->string('column_4')->nullable();
            $table->string('column_5')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
