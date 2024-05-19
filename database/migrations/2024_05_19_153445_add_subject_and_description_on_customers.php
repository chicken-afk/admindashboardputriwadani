<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shop_customers', function (Blueprint $table) {
            $table->string("subject")->after("email")->nullable();
            $table->string("description")->after("subject")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shop_customers', function (Blueprint $table) {
            //
        });
    }
};
