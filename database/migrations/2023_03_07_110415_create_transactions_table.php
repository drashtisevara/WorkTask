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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            
            $table->decimal('amount', 10, 2);
            $table->enum('type', ['income', 'expense', 'transfer']);
            $table->string('category');
            $table->string('note');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('accounts_id');
           
            $table->foreign('accounts_id')->references('id')->on('accounts')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('account_models_id');
           
            $table->foreign('account_models_id')->references('id')->on('account_models')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();

            

            

            





            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};