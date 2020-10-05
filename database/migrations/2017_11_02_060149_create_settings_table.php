<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->string('logo', 191)->nullable();
            $table->string('favicon', 191)->nullable();
            $table->string('seo_title', 191)->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_description')->nullable();

//            Conpany Info
            $table->string('company_name', 191)->nullable();
            $table->string('company_logo', 191)->nullable();
            $table->string('company_contact_1', 191)->nullable();
            $table->string('company_contact_2', 191)->nullable();
            $table->text('company_address')->nullable();
            $table->string('company_email', 191)->nullable();
            $table->string('company_map', 191)->nullable();

//            End Company Info

            $table->string('from_name', 191)->nullable();
            $table->string('from_email', 191)->nullable();
            $table->string('facebook', 191)->nullable();
            $table->string('linkedin', 191)->nullable();
            $table->string('twitter', 191)->nullable();
            $table->string('google', 191)->nullable();
            $table->string('copyright_text', 191)->nullable();
            $table->string('footer_text', 191)->nullable();
            $table->text('terms')->nullable();
            $table->text('disclaimer')->nullable();
            $table->text('google_analytics')->nullable();
            $table->string('home_video1', 191)->nullable();
            $table->string('home_video2', 191)->nullable();
            $table->string('home_video3', 191)->nullable();
            $table->string('home_video4', 191)->nullable();
            $table->string('explanation1', 191)->nullable();
            $table->string('explanation2', 191)->nullable();
            $table->string('explanation3', 191)->nullable();
            $table->string('explanation4', 191)->nullable();
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
        Schema::drop('settings');
    }
}
