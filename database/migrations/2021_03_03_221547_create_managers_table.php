<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('cnic')->nullable();
            $table->string('age')->nullable();
            $table->string('column_1')->nullable();
            $table->string('column_2')->nullable();
            $table->string('column_3')->nullable();
            $table->string('column_4')->nullable();
            $table->string('column_5')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('package_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('managers');
    }
}
