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
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade'); // Foreign Key to 'computers' table
            $table->string('reported_by', 50); // Reporter
            $table->date('reported_date'); // Date the issue was reported
            $table->text('description'); // Issue description
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Urgency level
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Status of the issue
            $table->timestamps(); // Timestamps (created_at and updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
