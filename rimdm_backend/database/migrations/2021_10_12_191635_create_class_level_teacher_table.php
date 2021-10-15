<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassLevelTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_level_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_level_id')->constrained('class_levels')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('teachers')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_level_teacher', function (Blueprint $table) {
            $table->dropForeign(['class_level_id']);
            $table->dropColumn('class_level_id');
            $table->dropForeign(['teacher_id']);
            $table->dropColumn('teacher_id');
        });
        Schema::dropIfExists('class_level_teacher');
    }
}
