<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Movie;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->float('rating');
            $table->integer('own_rating');
            $table->foreignIdFor(Movie::class)->constrained()->onDelete('cascade'); // Add movie_id foreign key
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); // Add user_id foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};