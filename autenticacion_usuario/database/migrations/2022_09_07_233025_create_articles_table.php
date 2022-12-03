<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('providers_id')->constrained();
            $table->foreignId('categories_id')->constrained();
            $table->bigInteger('code');
            $table->string('name', 50);
            $table->bigInteger('selling_price');
            $table->integer('stock');
            $table->string('description', 100);
            $table->string('image', 300);
            $table->boolean('active');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
