<?php

use App\Enums\Property_status;
use App\Enums\Property_type;
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
        Schema::create('property_characteristics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->float('price');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->float('sqft');
            $table->float('price_sqft');
            $table->enum('property_type',array_column(Property_type::cases(),'value'));
            $table->enum('status',array_column(Property_status::cases(),'value'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_characteristics');
    }
};
