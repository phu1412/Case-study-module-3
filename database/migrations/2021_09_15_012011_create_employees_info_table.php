<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('personal_email');
            $table->string('phone');
            $table->date('birthday');
            $table->string('address');
            $table->string('citizen_identification');
            $table->string('gender');
            $table->date('join_company_date');
            $table->string('image');
            $table->string('position_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_info');
    }
}
