<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER updateTotal AFTER INSERT ON points FOR EACH ROW
                BEGIN
                    IF NEW.direction = 'add' THEN
                        UPDATE users SET points = points + NEW.points WHERE id = NEW.user_id;
                    ELSEIF NEW.direction = 'sub' THEN
                        UPDATE users SET points = CAST(points AS SIGNED) - CAST(NEW.points as SIGNED) WHERE id = NEW.user_id;
                        END IF;
                END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
