<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToPrograms extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
