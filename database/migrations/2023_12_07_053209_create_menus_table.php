<?php

use App\Models\MenuLabel;
use App\Traits\Uuids;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use Uuids;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('icon');
            $table->string('route');
            $table->boolean('status')->default(true);
            $table->string('permission_name');
            $table->foreignIdFor(MenuLabel::class);
            $table->integer('posision');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
