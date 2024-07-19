<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoostOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('boost_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('employee_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('game_name');
            $table->string('platform');
            $table->string('region');
            $table->string('start_tier');
            $table->string('start_division');
            $table->string('desired_tier');
            $table->string('desired_division');
            $table->string('roll')->nullable();
            $table->boolean('is_streaming');
            $table->boolean('is_solo');
            $table->double('price');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boost_orders');
    }
}
