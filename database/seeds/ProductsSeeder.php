<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call([
            // ProductsTableSeeder::class,
            // ColorsTableSeeder::class,
            // SizeTableSeeder::class,
            ImageTableSeeder::class,
            // NewProductSeeder::class,
            NewProductImageSeeder::class,
        ]);
    }
}
