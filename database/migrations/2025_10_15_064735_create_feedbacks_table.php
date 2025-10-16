<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->string('customer_name');
            $table->string('company')->nullable();
            $table->string('product');
            $table->date('order_date');
            $table->date('date_start');
            $table->date('date_end');
            $table->tinyInteger('rating_quality');
            $table->tinyInteger('rating_timeliness');
            $table->tinyInteger('rating_service');
            $table->tinyInteger('rating_price');
            $table->tinyInteger('rating_overall');
            $table->text('comment');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
