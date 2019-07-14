<?php

use Illuminate\Database\Seeder;

class NewProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->insert([
        //     'product_name' => 'Alice Vest',
        //     'product_stock' => rand(1,100),
        //     'product_price' => 395000,
        //     'product_material' => '',
        //     'product_description' => '',
        //     'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.',
        //     'product_new_arrival_flag' => 'true',
        // ]);

        DB::table('products')->insert([
            'product_name' => 'Amer Top',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Ayana Dress',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Cassandra Dress',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Cella Jacket',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        // DB::table('products')->insert([
        //     'product_name' => 'Gaia Top',
        //     'product_stock' => rand(1,100),
        //     'product_price' => 0,
        //     'product_material' => '',
        //     'product_description' => '',
        //     'product_wash_instruction' => '',
        //     'product_new_arrival_flag' => 'true',
        // ]);

        DB::table('products')->insert([
            'product_name' => 'Gina Vest',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Jenner Top',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        // DB::table('products')->insert([
        //     'product_name' => 'Kimmy Top',
        //     'product_stock' => rand(1,100),
        //     'product_price' => 0,
        //     'product_material' => '',
        //     'product_description' => '',
        //     'product_wash_instruction' => '',
        //     'product_new_arrival_flag' => 'true',
        // ]);

        DB::table('products')->insert([
            'product_name' => 'Lina Outer Linen',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        // DB::table('products')->insert([
        //     'product_name' => 'Mila Pants',
        //     'product_stock' => rand(1,100),
        //     'product_price' => 0,
        //     'product_material' => '',
        //     'product_description' => '',
        //     'product_wash_instruction' => '',
        //     'product_new_arrival_flag' => 'true',
        // ]);

        // DB::table('products')->insert([
        //     'product_name' => 'Gina Vest',
        //     'product_stock' => rand(1,100),
        //     'product_price' => 0,
        //     'product_material' => '',
        //     'product_description' => '',
        //     'product_wash_instruction' => '',
        //     'product_new_arrival_flag' => 'true',
        // ]);

        DB::table('products')->insert([
            'product_name' => 'Siena Top',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Tina Top',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Victoria Vest',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => '',
            'product_description' => '',
            'product_wash_instruction' => '',
            'product_new_arrival_flag' => 'true',
        ]);
    }
}
