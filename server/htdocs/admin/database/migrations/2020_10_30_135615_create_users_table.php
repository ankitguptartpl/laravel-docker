<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email_address')->unique();
            $table->string('mobile_country_code',5)->nullable();
            $table->string('mobile_no',15)->nullable();
            $table->text('other_details')->nullable();
            $table->string('password')->nullable();
            $table->unsignedTinyInteger('is_email_verified')->default(0)->comment('0 => No 1 => Yes');
            $table->unsignedTinyInteger('is_mobile_verified')->default(0)->comment('0 => No 1 => Yes');
            $table->unsignedTinyInteger('is_blocked')->default(0)->comment('0 => No 1 => Yes');
            $table->unsignedBigInteger('created_by')->nullable()->comment('FK (Refer to users table)');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('FK (Refer to users table)');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
