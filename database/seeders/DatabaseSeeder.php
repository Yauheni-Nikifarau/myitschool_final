<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DiscountsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(TripsTableSeeder::class);
        $this->call(TagsAssignsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(AdminTablesSeeder::class);



        //Обновление данных о бронировании путевок
        $orders = Order::all();
        foreach ($orders as $order) {
            $interval = (int) $order->reservation_expires;
            $interval = time() - $interval;
            if ($order->paid || $interval < 86400 * 3) {
                $trip = $order->trip;
                $trip->reservation = true;
                $trip->save();
            }
        }
    }
}
