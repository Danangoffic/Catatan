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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id', 'todo_user_id_fk')
                ->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->boolean('completed')->default(false);
            $table->date('due_date')->nullable();
            $table->integer('priority')->default(0);
            $table->timestamps();
            $table->index('user_id');
            $table->index('completed');
            $table->index('priority');
            $table->index('due_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
