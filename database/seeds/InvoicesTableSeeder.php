<?php

use App\Invoice;
use App\InvoiceItem;
use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoice::truncate();
        InvoiceItem::truncate();

        $faker = \Faker\Factory::create();

        foreach (range(1, 25) as $i) {
            $invoice = Invoice::create([
                'number'      => 'INV-2000'.$i,
                'customer_id' => $i,
                'date'        => '2018-11-'.$i,
                'due_date'    => '2018-12-'.$i,
                'reference'   => 'LPO #'.$i,
                'discount'    => mt_rand(0, 100),
                'sub_total'   => mt_rand(1000, 2000),
                'terms_and_conditions' => $faker->text,
            ]);

            foreach (range(1, mt_rand(2, 4)) as $j) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => mt_rand(1, 40),
                    'unit_price' => mt_rand(100, 500),
                    'qty'        => mt_rand(1, 6),
                ]);
            }
        }
    }
}
