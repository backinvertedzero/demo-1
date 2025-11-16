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
        Schema::create('system_params', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('value');
            $table->string('description');
            $table->timestamps();

            $table->unique('tag', 'system_params_tag_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_params');
    }
};
