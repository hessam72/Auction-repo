<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // \App\Models\User::factory(100)->create();
        // \App\Models\Category::factory(15)->create();
        // \App\Models\Admin::factory()->create();
        // \App\Models\State::factory(10)->create();
        // \App\Models\City::factory(50)->create();

        \App\Models\Product::factory(25)->create();
        // \App\Models\ProductGallery::factory(50)->create();
        // \App\Models\Auction::factory(50)->create();




        // \App\Models\BidBuddy::factory(50)->create();
        // \App\Models\BiddingHistory::factory(50)->create();
        // \App\Models\BiddingQueue::factory(200)->create();

        
        // \App\Models\UserShipedProduct::factory(8)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
