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
        Schema::table('memberships', function (Blueprint $table) {
            $table->decimal('amount_paid', 10, 2)->default(0);  // Jumlah yang dibayar
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');  // Status pembayaran
        });
    }

    public function down()
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropColumn('amount_paid');
            $table->dropColumn('payment_status');
        });
    }
};
