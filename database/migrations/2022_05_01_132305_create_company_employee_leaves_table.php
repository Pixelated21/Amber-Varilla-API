<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyEmployeeLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('company_employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_employee_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('leave_id')->constrained('leaves')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('startDate');
            $table->date('endDate');
            $table->bigInteger('status')->default(2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_employee_leaves');
    }
}
