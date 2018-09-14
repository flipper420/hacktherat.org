<?php

use Illuminate\Database\Seeder;
use App\Models\Rank;
class createranksseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::create([
            'id' 			=> 1,
            'name' 			=> 'Noob',
            'description' 	=> 'New to the game.',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/d/d9/Rank_01_black.png/revision/latest/scale-to-width-down/60?cb=20170314202225',
            'slug' 			=> 'noob',
            'cost'       	=> 0,
        ]);

        Rank::create([
            'id' 			=> 2,
            'name' 			=> 'Rookie',
            'description' 	=> 'Learned a couple things.',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/a/a9/Rank_02_black.png/revision/latest/scale-to-width-down/60?cb=20170314181623',
            'slug' 			=> 'rookie',
            'cost'       	=> 500,
        ]);

        Rank::create([
            'id' 			=> 3,
            'name' 			=> 'Talented',
            'description' 	=> 'Man aren\'t you talented',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/7/77/Rank_03_black.png/revision/latest/scale-to-width-down/60?cb=20170314181731',
            'slug' 			=> 'talented',
            'cost'       	=> 750,
        ]);

        Rank::create([
            'id' 			=> 4,
            'name' 			=> 'Skilled',
            'description' 	=> 'Got skillz son!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/1/10/Rank_04_black.png/revision/latest/scale-to-width-down/60?cb=20170314181749',
            'slug' 			=> 'skilled',
            'cost'       	=> 1000,
        ]);

        Rank::create([
            'id' 			=> 5,
            'name' 			=> 'Experienced',
            'description' 	=> 'Gettin\' good!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/e/e2/Rank_05_black.png/revision/latest/scale-to-width-down/60?cb=20170314181810',
            'slug' 			=> 'experienced',
            'cost'       	=> 1250,
        ]);

        Rank::create([
            'id' 			=> 6,
            'name' 			=> 'Advanced',
            'description' 	=> 'Got some advanced skills!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/3/3a/Rank_06_black.png/revision/latest/scale-to-width-down/60?cb=20170314181835',
            'slug' 			=> 'advanced',
            'cost'       	=> 1500,
        ]);

       Rank::create([
            'id' 			=> 7,
            'name' 			=> 'Senior',
            'description' 	=> 'Been doing this for some time!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/3/32/Rank_07_black.png/revision/latest/scale-to-width-down/60?cb=20170314181900',
            'slug' 			=> 'senior',
            'cost'       	=> 1750,
        ]);

        Rank::create([
            'id' 			=> 8,
            'name' 			=> 'Expert',
            'description' 	=> 'Knows it ALL!!!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/3/3d/Rank_08_black.png/revision/latest/scale-to-width-down/60?cb=20170314181924',
            'slug' 			=> 'expert',
            'cost'       	=> 2000,
        ]);

        Rank::create([
            'id' 			=> 9,
            'name' 			=> 'Veteran',
            'description' 	=> 'Getting too old for this shit!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/c/c2/Rank_09_black.png/revision/latest/scale-to-width-down/60?cb=20170314182127',
            'slug' 			=> 'veteran',
            'cost'       	=> 2250,
        ]);

        Rank::create([
            'id' 			=> 10,
            'name' 			=> 'Master',
            'description' 	=> 'The One They Call Master!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/b/b9/Rank_10_black.png/revision/latest/scale-to-width-down/60?cb=20170314182158',
            'slug' 			=> 'master',
            'cost'       	=> 2500,
        ]);

        Rank::create([
            'id' 			=> 11,
            'name' 			=> 'Elite',
            'description' 	=> 'The Best of the best!',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/6/60/Rank_11_black.png/revision/latest/scale-to-width-down/60?cb=20170314182226',
            'slug' 			=> '31337',
            'cost'       	=> 3000,
        ]);

        Rank::create([
            'id' 			=> 12,
            'name' 			=> 'HTR Hacked Admin',
            'description' 	=> 'Only a few have attained this ranking.',
            'img_url' 		=> 'https://vignette.wikia.nocookie.net/hackersthegame/images/6/60/Rank_11_black.png/revision/latest/scale-to-width-down/60?cb=20170314182226',
            'slug' 			=> 'htr_hacker',
            'cost'       	=> 10000,
        ]);

    }
}
