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
        // this part is the database backend code
        //This is the table, and inside of it are its columns, the format is
        // $table->variabletype('name(ifNeeded)');  
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // we are making a column in the table being called name type string
            $table->integer('quantity');
            $table->decimal('price');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
