<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName',50);
            $table->string('lasttName',50);
            $table->string('extension',10);
            $table->string('email',100);
            $table->unsignedBigInteger('office_id')->index(); /**Relation na offices tablicu + kreiranje indexa*/
            $table->unsignedBigInteger('employee_id')->index()->nullable(); /**Self relation na employees tablicu + index + može biti NULL vrijednost*/
            $table->string('jobTitle',50);
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('office_id')->references('id')->on('offices'); /**Kreiranje foreign key-a */
            $table->foreign('employee_id')->references('id')->on('employees'); /**Kreiranje foreign key-a */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
