<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaternityLeavePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maternity_leave_policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('com_id')->references('id')->on('company_infos');
            $table->integer('has_policy')->nullable();
            $table->string('rule_name')->nullable();
            $table->string('alloc_days')->nullable();
            $table->string('before_edd')->nullable();
            $table->string('after_edd')->nullable();
            $table->string('depends_on')->nullable();
            $table->string('alloc_after')->nullable();
            $table->string('cal_type')->nullable();
            $table->string('first_pay')->nullable();
            $table->string('last_pay')->nullable();
            $table->integer('benefits_no')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('added_by')->nullable()->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('maternity_leave_policies');
    }
}
