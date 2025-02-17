<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            // Unique session id, set as primary key
            $table->string('id')->primary();
            
            // Optional: to link sessions with users. Set nullable in case the user is not logged in.
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            
            // The payload (session data)
            $table->text('payload');
            
            // Timestamp of last activity (Unix timestamp)
            $table->integer('last_activity');
            
            // Optional: Store the IP and user agent if needed (you can remove these if not required)
            // $table->string('ip_address')->nullable();
            // $table->text('user_agent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}

