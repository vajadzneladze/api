<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [ 'title' => 'ადმინისტრატორი', 'level' => '1', 'description' => ''],
            [ 'title' => 'კლიენტი', 'level' => '2', 'description' => ''],
            [ 'title' => 'ედიტორი', 'level' => '3', 'description' => ''],

        ];

        foreach ($items as $item) {
            App\Models\Role::updateOrCreate($item);
        }
    }
}
