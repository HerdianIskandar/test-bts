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
        Schema::create('todo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklist_id')->constrained(
                table: 'checklist',
                indexName: 'todo_checklist_id'
            );
            $table->string('name', 100);
            $table->string('status', 100)->default('unchecked')->comment('between: checked, unchecked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
