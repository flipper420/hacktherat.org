<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		DB::table('categories')->delete();
        //$category = factory(App\Models\Category::class, 15)->create();

		// NoobSeeder
		Category::create([
				'name'        => "Noob",
				'description' => "Very, very easy challenges designed to teach you the very basics of hacking.",
				'slug'        => "noob",
				'type'        => "Mission"
			]);

		// BasicSeeder
		Category::create([
				'name'        => 'Basic',
				'description' => 'Easy challenges that are designed to teach you various different web application hacking techniques.',
				'slug'        => 'basic',
				'type'        => 'Mission'
			]);

		// RealisticSeeder
		Category::create([
				'name'        => 'Realistic',
				'description' => 'Challenges designed to emulate real-world attacks on real-world websites. Each challenge is designed as an individual complete, fully-functional web applicationeach with different vulnerabilties designed to teach you realistic hacking techniques.',
				'slug'        => 'realistic',
				'type'        => 'Mission'
			]);

		// JavascriptSeeder
		Category::create([
				'name'        => 'Javascript',
				'description' => 'Challenges designed to teach you javascript hacking and bypasses',
				'slug'        => 'javascript',
				'type'        => 'Mission'
			]);

		// CrackerSeeder
		Category::create([
				'name'        => 'Cracking',
				'description' => 'Challenges designed to teach you different cracking techniques for Windows, Linux, and MacOSX.',
				'slug'        => 'cracking',
				'type'        => 'Mission'
			]);

		// ProgrammingSeeder
		Category::create([
				'name'        => 'Programming',
				'description' => 'Challenges designed to flex your brain-muscles and improve your programming skillz.',
				'slug'        => 'programming',
				'type'        => 'Mission'
			]);

		// CryptoSeeder
		Category::create([
				'name'        => 'Crypto',
				'description' => 'Encryption, Decryption, Ciphers, and Deciphers. These challenges will teach you all about the world of cryptography.',
				'slug'        => 'crypto',
				'type'        => 'Mission'
			]);

		// BugFinderSeeder
		Category::create([
				'name'        => 'Bugs Finder',
				'description' => 'Can you find the line in the source code that contains the bug?',
				'slug'        => 'bugs-finder',
				'type'        => 'Mission'
			]);

		// ApplicationSeeder
		Category::create([
				'name'        => 'Application',
				'description' => 'Android and Iphone application cracking.',
				'slug'        => 'application',
				'type'        => 'Mission'
			]);
	}
}
