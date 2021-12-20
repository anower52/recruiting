<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reference_number');
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->integer('gender');
            $table->integer('religion');
            $table->string('date_of_birth');
            $table->string('place_of_birth')->nullable();
            $table->integer('birth_country')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->integer('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('salary')->nullable();
            $table->text('personal_image')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('father_name')->nullable();
            $table->string('family_mobile_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->text('passport_image')->nullable();
            $table->boolean('ttc')->default(0);
            $table->string('visa_country')->nullable();
            $table->boolean('police_report')->default(0);
            $table->string('fly_date')->nullable();
            $table->string('fly_time')->nullable();
            $table->string('work_area')->nullable();
            $table->string('passport_expired_date')->nullable();
            $table->integer('experience_country')->nullable();
            $table->integer('experience_years')->nullable();
            $table->integer('agent_id')->nullable();
            $table->integer('visa_office')->nullable();
            $table->integer('visa_check_of')->nullable();
            $table->boolean('medical_report')->nullable();
            $table->boolean('mofa')->nullable();
            $table->boolean('embassy')->nullable();
             $table->boolean('finger')->nullable();
             $table->boolean('man_power')->nullable();
             $table->boolean('ticket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passports');
    }
}
