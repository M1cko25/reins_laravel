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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('key')->unique();
            $table->foreignId('project_template_id')->nullable()->constrained('project_templates')->nullOnDelete();
            $table->integer('status')->default(1);
            $table->foreignId('access_id')->nullable()->constrained('project_accesses')->nullOnDelete();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('target_end_date')->nullable();
            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
            $table->string('url')->unique()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
