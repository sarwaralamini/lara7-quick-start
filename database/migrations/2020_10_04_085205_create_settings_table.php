<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('site_author');
            $table->string('site_url');
            $table->text('site_keywords');
            $table->longText('site_description');
            $table->string('site_type')->nullable();
            $table->string('site_robots')->nullable();
            $table->string('site_image')->nullable();
            $table->string('site_image_width')->nullable();
            $table->string('site_image_height')->nullable();
            $table->string('site_app_id')->nullable();
            $table->enum('site_card', ['summary','summary_large_image','app','player'])->nullable();
            $table->string('site_creator')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
