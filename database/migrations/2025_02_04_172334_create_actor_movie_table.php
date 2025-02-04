<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Actor;
use App\Models\Movie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actor_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Actor::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Movie::class)->constrained()->onDelete('cascade');
            $table->unique(['actor_id', 'movie_id']); // Add unique constraint to avoid duplicates
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_movie');
    }
};