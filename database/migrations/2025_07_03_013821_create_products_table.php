<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Nama produk dan slug SEO‑friendly
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('plant_id')->nullable()->constrained()->cascadeOnDelete();

            // Kategori dan link pemesanan
            $table->string('category')->nullable();
            $table->string('order_link')->nullable();

            // Harga, stok, dan foto
            $table->decimal('price', 12, 2)->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->text('description')->nullable();
            $table->string('photo')->nullable();

            // Counter untuk popularitas
            $table->unsignedBigInteger('view_count')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
