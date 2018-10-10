<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CompletedMissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('completed_missions')->delete();
		$completedmission = factory(App\Models\CompletedMission::class, 250)->create();
		//$completedmission = factory(App\Models\CompletedMission::class, 25)->create(['user_id' => 1]);
    }
}
