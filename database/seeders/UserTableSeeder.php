<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // How many genres you need, defaulting to 10
        $count = (int)$this->command->ask('How many genres do you need ?', 10);

        $this->command->info("Creating {$count} genres.");

        // Create the Genre
        User::factory()->count($count)->create();

        $this->command->info('Genres Created!');

    }

}
