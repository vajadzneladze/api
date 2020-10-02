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

        ];

        foreach ($items as $item) {
            App\Models\Role::updateOrCreate($item);
        }
    }
}
