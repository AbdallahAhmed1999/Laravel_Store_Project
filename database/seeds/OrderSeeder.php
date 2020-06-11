<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id' => 1,
            'status' => 'pending'
        ]);

        Order::create([
            'user_id' => 1,
            'status' => 'delivered'
        ]);
    }
}
