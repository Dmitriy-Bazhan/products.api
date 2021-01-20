<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    Product::factory()->count(50)->create();

        // factory(App\Models\Product::class, 50)->create()->each(function () {
        //     return factory(App\Product::class)->make();
        // });
    }
}
