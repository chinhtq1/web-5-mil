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
            $table->string('app_name', 191)->nullable();
            $table->string('logo', 191)->nullable();
            $table->string('favicon', 191)->nullable();
            $table->string('seo_title', 191)->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_description')->nullable();

//          Chỉnh sửa chung
            $table->string('fb_link', 191)->nullable();
            $table->string('twitter_link', 191)->nullable();
            $table->string('printerest_link', 191)->nullable();
            $table->string('rss_link', 191)->nullable();
            $table->string('header_color', 191)->nullable();
            $table->string('footer_color', 191)->nullable();
            $table->string('header_title', 191)->nullable();

            $table->string('blog_title', 191)->nullable();
            $table->string('product_title', 191)->nullable();
            $table->string('document_title', 191)->nullable();
            $table->string('contact_title', 191)->nullable();
            $table->string('event_title', 191)->nullable();

//            Trang chủ
            $table->string('section_index_1', 191)->nullable();
            $table->string('section_index_2', 191)->nullable();
            $table->string('section_index_3', 191)->nullable();


//            Conpany Info
            $table->string('company_name', 191)->nullable();
            $table->string('company_logo', 191)->nullable();
            $table->string('company_contact_1', 191)->nullable();
            $table->string('company_contact_2', 191)->nullable();
            $table->text('company_address')->nullable();
            $table->string('company_email', 191)->nullable();
            $table->string('company_map', 191)->nullable();

//            End Company Info

            // Contact

//            Contact 1
            $table->string('contact_1_title', 191)->nullable();
            $table->string('contact_name_1_0', 191)->nullable();
            $table->string('contact_number_1_0', 191)->nullable();
            $table->string('contact_name_1_1', 191)->nullable();
            $table->string('contact_number_1_1', 191)->nullable();
            $table->string('contact_name_1_2', 191)->nullable();
            $table->string('contact_number_1_2', 191)->nullable();
            $table->string('contact_name_1_3', 191)->nullable();
            $table->string('contact_number_1_3', 191)->nullable();

//            Contact 2
            $table->string('contact_2_title', 191)->nullable();
            $table->string('contact_name_2_0', 191)->nullable();
            $table->string('contact_number_2_0', 191)->nullable();
            $table->string('contact_name_2_1', 191)->nullable();
            $table->string('contact_number_2_1', 191)->nullable();
            $table->string('contact_name_2_2', 191)->nullable();
            $table->string('contact_number_2_2', 191)->nullable();
            $table->string('contact_name_2_3', 191)->nullable();
            $table->string('contact_number_2_3', 191)->nullable();

//            Contact 3
            $table->string('contact_3_title', 191)->nullable();
            $table->string('contact_name_3_0', 191)->nullable();
            $table->string('contact_number_3_0', 191)->nullable();
            $table->string('contact_name_3_1', 191)->nullable();
            $table->string('contact_number_3_1', 191)->nullable();
            $table->string('contact_name_3_2', 191)->nullable();
            $table->string('contact_number_3_2', 191)->nullable();
            $table->string('contact_name_3_3', 191)->nullable();
            $table->string('contact_number_3_3', 191)->nullable();

            $table->string('facebook', 191)->nullable();
            $table->string('linkedin', 191)->nullable();
            $table->string('twitter', 191)->nullable();
            $table->string('google', 191)->nullable();
            $table->text('terms')->nullable();
            $table->text('disclaimer')->nullable();
            $table->text('google_analytics')->nullable();
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
