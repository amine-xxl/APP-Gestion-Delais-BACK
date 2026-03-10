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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('n_garde');
            $table->date('date_garde');
            $table->text('sujet');
            $table->date('date_recu');
            $table->date('limite_recu')->nullable();
            $table->integer('delais_recu')->nullable();
            $table->text('reponse')->nullable();
            $table->string('n_reponse')->nullable();
            $table->date('date_reponse')->nullable();
            $table->enum('priority', ['urgent', 'normal'])->default('normal');
            $table->enum('status', ['pending', 'answered', 'archived'])->default('pending');
            $table->boolean('reminder_sent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
