<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('local_name');
            $table->string('scientific_name')->nullable();
            $table->string('slug')->unique();
            $table->string('photo')->nullable();
            $table->text('benefits')->nullable();
            $table->text('processing')->nullable();
            $table->string('order_link')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
