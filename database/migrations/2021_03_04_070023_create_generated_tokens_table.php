<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratedTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('user_mail')->nullable();
            $table->string('token_id')->nullable();
            $table->string('saved_token')->nullable();
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
        Schema::dropIfExists('generated_tokens');
    }
}
