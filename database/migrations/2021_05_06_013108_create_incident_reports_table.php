<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncidentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('consumer_id')->nullable();
            $table->string('nature_of_incident')->nullable();
            $table->text('incident_detail')->nullable();
            $table->text('additional_notes')->nullable();
            $table->string('incident_date')->nullable();
            $table->integer('report_created_by')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('incident_reports');
    }
}
