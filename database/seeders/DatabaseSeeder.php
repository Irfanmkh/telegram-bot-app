<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Setting::updateOrCreate(['key' => 'telegram_bot_username'], ['value' => 'NamaBotKamu_bot']);
        Setting::updateOrCreate(['key' => 'telegram_bot_token'], ['value' => '8123456789:AAxxxx...']);
        Setting::updateOrCreate(['key' => 'bank_info'], ['value' => "BCA: 1234567890 a.n. Owner\nMandiri: 0987654321 a.n. Owner"]);



        $this->call([
                    UserSeeder::class,
                ]);

    }
}
