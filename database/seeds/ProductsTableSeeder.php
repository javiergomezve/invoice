<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        foreach (range(10, 60) as $item) {
            Product::create([
                'item_code'   => 'PDT-1000'.$item,
                'description' => 'Product '.$item,
                'unit_price'  => mt_rand(100, 1000),
            ]);
        }
    }
}
