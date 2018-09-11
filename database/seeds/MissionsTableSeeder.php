<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('missions')->delete();
		$mission = factory(App\Models\Mission::class, 150)->create();
    }
}
