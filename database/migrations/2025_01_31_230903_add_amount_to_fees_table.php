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
    Schema::table('fees', function (Blueprint $table) {
        $table->decimal('amount', 8, 2)->nullable(); // Adjust type and size as needed
    });
}

public function down()
{
    Schema::table('fees', function (Blueprint $table) {
        $table->dropColumn('amount');
    });
}

};
