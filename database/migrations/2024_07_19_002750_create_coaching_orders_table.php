<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachingOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('coaching_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('employee_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('game_name');
            $table->string('platform');
            $table->string('region');
            $table->integer('number_of_hours');
            $table->boolean('is_streaming');
            $table->boolean('is_solo');
            $table->double('price');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coaching_orders');
    }
}
