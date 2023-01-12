<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('about_title');
            $table->longText('about_detail');
            $table->text('about_status')->default('Show');

            $table->text('faq_title');
            $table->longText('faq_detail');
            $table->text('faq_status')->default('Show');

            $table->text('contact_title');
            $table->longText('contact_detail');
            $table->text('contact_map');
            $table->text('contact_status')->default('Show');

            $table->text('terms_title');
            $table->longText('terms_detail');
            $table->text('terms_status')->default('Show');

            $table->text('privacy_title');
            $table->longText('privacy_detail');
            $table->text('privacy_status')->default('Show');

            $table->text('disclaimer_title');
            $table->longText('disclaimer_detail');
            $table->text('disclaimer_status')->default('Show');

            $table->text('login_title');
            $table->longText('login_status')->default('Show');
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
        Schema::dropIfExists('pages');
    }
};
