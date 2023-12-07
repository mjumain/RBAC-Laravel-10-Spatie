<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\Uuids;
return new class extends Migration
{
    use Uuids;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_labels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->boolean('status')->default(true);
            $table->string('permission_name');
            $table->integer('posision');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_labels');
    }
};
