<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'id' => 1,
                'firstname' => "Иван",
                'lastname' => "Иванов",
                'birthdate' => Carbon::parse('22-02-1999'),
                'phone' => "+79000010000"
            ],
            [
                'id' => 2,
                'firstname' => "Алексей",
                'lastname' => "Петров",
                'birthdate' => Carbon::parse('23-02-1999'),
                'phone' => "+79000010010"
            ],
            [
                'id' => 3,
                'firstname' => "Констанин",
                'lastname' => "Жаров",
                'birthdate' => Carbon::parse('24-02-1999'),
                'phone' => "+79000010020"
            ],
            [
                'id' => 4,
                'firstname' => "Максим",
                'lastname' => "Леонов",
                'birthdate' => Carbon::parse('25-02-1999'),
                'phone' => "+79000010030"
            ],
            [
                'id' => 5,
                'firstname' => "Денис",
                'lastname' => "Турушев",
                'birthdate' => Carbon::parse('26-02-1999'),
                'phone' => "+79005250538"
            ],
        ]);
    }
}
