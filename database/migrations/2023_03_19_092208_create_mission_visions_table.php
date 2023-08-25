<?php

use App\Models\MissionVision;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionVisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_visions', function (Blueprint $table) {
            $table->id();
            $table->longText('mission_desc');
            $table->longText('vision_desc');
            $table->timestamps();
        });

        MissionVision::create([
            'mission_desc' => 'Test',
            'vision_desc' => 'Test',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_visions');
    }
}