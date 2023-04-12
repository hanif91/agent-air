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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id')->nullable(false);
            $table->decimal('harga',15,2)->default(0.00);
            $table->integer('qty')->unsigned()->nullable()->default(0);
            $table->t('total',15,2)->default(0.00);
            $table->smallInteger('flaglunas')->length(10)->unsigned()->default(0);
            $table->dateTime('tglbayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
