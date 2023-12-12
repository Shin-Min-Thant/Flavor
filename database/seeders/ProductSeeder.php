<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'Burmese Bliss', 'Golden Sunshine Tea', 'Mango Tango Delight', 'Rangoon Rosewater Elixir', 'Emerald Green Chai', 'Citrus Fusion Fizz',
            'Coconut Cream Dream', 'Jasmine Serenade Soda', 'Papaya Paradise Punch', 'Lychee Lullaby',
            'Tropical Twilight Nectar', 'Orchid Oasis Euphoria', 'Starfruit Saprking Sorbet',
            'Ginger Zing Zest', 'Lush Lemongrass Infustion', 'Ruby Red Guava Gusto',
            'Blueberry Burst Breeze', 'Pineapple Pizzass Quencher', 'Passionfruit Pomegranate Bliss',
            'Exotic Cucumber Limeade'
        ];

        $final_products = [];

        foreach ($products as $product) {
            $final_products[] = [
                'product_name' => $product,
                'product_price' => rand(5000, 10000),
                'bottles_per_box' => rand(10, 300),
            ];
        }
        Product::insert($final_products);


    }

}
