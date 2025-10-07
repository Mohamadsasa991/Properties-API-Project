<?php

use App\Enums\Listing_type;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('broker_id')->constrained()->cascadeOnDelete();
            $table->string('address')->unique();
            $table->enum('listing_type',[
                Listing_type::OPEN->value,
                Listing_type::SELL->value,
                Listing_type::EXECLUSIVE->value,
                Listing_type::NET->value,
            ])->default(Listing_type::OPEN->value);
            $table->string('city');
            $table->string('zip_code')->unique();
            $table->text('description');
            $table->year('build_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
