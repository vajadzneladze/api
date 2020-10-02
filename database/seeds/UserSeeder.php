<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'email'   => 'vaja.dzneladze@gmail.com',
                'password'=> bcrypt('password123'),
                'age'     => '26',
                'phone'   => '558 264 564',
                'role_id' => 1,
                'name'    => 'ვაჟა ძნელაძე'
            ],
        ];


        foreach ($items as $item) {
            App\User::updateOrCreate($item);
        }


        factory(App\User::class, 200)->create();
    }
}
