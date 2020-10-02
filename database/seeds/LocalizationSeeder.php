<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localizations')->truncate();

        $items = [
            [
                'title' => 'GEO',
                'abbreviation' => 'ge',
                'native' => 'ქართული',
                'locale' => 'ka_GE',
                'status' => true,
                'default' => true,
            ],
            [
                'title' => 'ENG',
                'abbreviation' => 'en',
                'native' => 'English',
                'locale' => 'en_US',
                'status' => true,
                'default' => false,
            ],
            [
                'title' => 'RUS',
                'abbreviation' => 'ru',
                'native' => 'Русский',
                'locale' => 'ru_RU',
                'status' => true,
                'default' => false,
            ],
        ];

        foreach ($items as $item) {
            App\Models\Localization::updateOrCreate($item);
        }
    }
}

