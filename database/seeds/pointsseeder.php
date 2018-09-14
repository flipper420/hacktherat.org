<?php

use Illuminate\Database\Seeder;

class pointsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $points = factory(App\Models\Point::class, 150)->create();
    }
}
