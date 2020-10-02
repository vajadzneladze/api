<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_boxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('item_id')->nullable();
            $table->bigInteger('local_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();  // html ედიტორით იქნება ეს ველი  , მაგრამ დიზაინს გააფუჭებს ამიტო description -იც დავამატე ჩვეულებრივი ტექსტი
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('front_boxes');
    }
}
