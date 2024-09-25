<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('binhluan', function (Blueprint $table) {
            $table->enum('trangthai', ['0', '1'])->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('binhluan', function (Blueprint $table) {
            $table->dropColumn('trangthai');
        });
    }
};
