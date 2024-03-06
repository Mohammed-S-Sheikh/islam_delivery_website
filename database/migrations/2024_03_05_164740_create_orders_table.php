<?php

use App\Models\City;
use App\Models\Delegate;
use App\Models\State;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('vendor');
            $table->string('vendor_number');
            $table->integer('customer_number_1');
            $table->integer('customer_number_2')->nullable();
            $table->string('customer_address');
            $table->double('total');
            $table->integer('number_of_items');
            $table->foreignIdFor(City::class);
            $table->foreignIdFor(Delegate::class);
            $table->foreignIdFor(State::class);
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
