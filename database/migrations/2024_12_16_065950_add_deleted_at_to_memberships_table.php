<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToMembershipsTable extends Migration
{
    public function up()
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at
        });
    }

    public function down()
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at jika migrasi dibatalkan
        });
    }
}