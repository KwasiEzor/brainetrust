<?php

use App\Models\Category;
use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->string('excerpt',200)->nullable();
            $table->longText('content');
            $table->string('cover_img')->nullable();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(User::class);
            $table->boolean('is_published')->default(0);
            $table->boolean('is_highlighted')->default(0);
            $table->unsignedBigInteger('views')->default(0);
            $table->string('source')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
