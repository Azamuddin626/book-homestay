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
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('is_admin');
        $table->string('roles')->default('user'); // Or use enum if you prefer
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('roles');
        $table->boolean('is_admin')->default(false); // Restore is_admin if needed
    });
}
};
