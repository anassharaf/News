<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('banner_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('CASCADE');
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('CASCADE');
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
        Schema::dropIfExists('campaign_banners');
    }
}
