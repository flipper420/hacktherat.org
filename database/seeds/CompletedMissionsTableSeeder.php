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
		$completedmission = factory(App\Models\CompletedMission::class, 250)->create();
    }
}
