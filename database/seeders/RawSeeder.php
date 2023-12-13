<?php

namespace Database\Seeders;

use App\Models\Raw;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raws = [
            [
                'product_id' => 1,
                'material_list'=>'Black tea leaves:3,000g<br>
                Lemongrass:1,500g<br>
                Ginger:750g<br>
                Honey:2,250g'
            ],
            [
                'product_id' => 2,
                'material_list'=>'Green tea leaves: 3,600g<br>
                Turmeric: 1,200g<br>
                Lemon peel: 800g<br>
                Chamomile: 400g'
            ],
            [
                'product_id' => 3,
                'material_list'=>'Mango puree: 7,500g<br>
                Black tea leaves: 3,750g<br>
                Orange zest: 1,250g<br>
                 Vanilla: 750g'
            ],
            [
                'product_id' => 4,
                'material_list'=>'Rose petals: 2,160g<br>
                Hibiscus: 1,440g<br>
                Elderflower: 1,080g<br>
                Rhubarb: 720g'
            ],
            [
                'product_id' => 5,
                'material_list'=>'Green tea leaves: 3,520g<br>
                Cardamom: 880g<br>
                Cinnamon: 660g<br>
                Cloves: 440g'
            ],
            [
                'product_id' => 6,
                'material_list'=>'Orange juice: 3,600g<br>
                 Lime juice: 1,800g<br>
                 Lemon zest: 600g<br>
                 Sparkling water: 2,400g'
            ],
            [
                'product_id' => 7,
                'material_list'=>'Coconut milk: 7,000g<br>
                Pineapple juice: 5,600g
                Agave syrup: 2,800g
                Cream: 1,400g'
            ],
            [
                'product_id' => 8,
                'material_list'=>'Jasmine tea leaves: 2,700g<br>
                Elderflower: 1,800g<br>
                Soda water: 1,500g<br>
                Sugar: 750g'
            ],
            [
                'product_id' => 9,
                'material_list'=>'Papaya puree: 7,000g
                Guava juice: 4,500g<br>
                Passionfruit: 3,000g<br>
                Mint: 500g'
            ],
            [
                'product_id' => 10,
                'material_list'=>'Lychee puree: 6,250g<br>
                White tea leaves: 3,750g<br>
                Rosewater: 1,250g<br>
                Honey: 2,500g'
            ],
            [
                'product_id' => 11,
                'material_list'=>'Pineapple juice: 5,280g<br>
                Mango puree: 4,320g<br>
                Passionfruit: 2,400g<br>
                Coconut water: 1,200g'
            ],
            [
                'product_id' => 12,
                'material_list'=>'Orchid petals: 1,760g<br>
                Lavender: 1,320g<br>
                Blueberry: 2,640g<br>
                Honey: 1,540g'
            ],
            [
                'product_id' => 13,
                'material_list'=>'Starfruit juice: 2,880g<br>
                Sparkling water: 2,400g<br>
                Agave syrup: 960g<br>
                Lime: 360g'
            ],
            [
                'product_id' => 14,
                'material_list'=>'Ginger root: 2,800g<br>
                Lemon juice: 4,200g<br>   Honey: 3,360g<br>
                Sparkling water: 3,640g'
            ],[
                'product_id' => 15,
                'material_list'=>'Lemongrass: 2,700g<br>
                Lemongrass tea leaves: 1,800g<br>
                Mint: 750g<br>
                Agave syrup: 750g'
        ],
        [
            'product_id' => 16,
            'material_list'=>'Guava puree: 5,000g<br>
            Hibiscus: 1,600g<br>
            Grapefruit juice: 3,000g<br>
            Agave syrup: 1,400g'
        ],
        [
            'product_id' => 17,
            'material_list'=>'Blueberry puree: 4,000g<br>
            Blueberry tea leaves: 2,400g<br>
            Mint: 1,000g<br>
            Soda water: 3,600g'
        ],
        [
            'product_id' => 18,
            'material_list'=>'Pineapple juice: 4,140g<br>
            Mint: 1,260g<br>
            Coconut water: 2,700g<br>
            Agave syrup: 900g'
        ],
        [
            'product_id' => 19,
            'material_list'=>' Passionfruit puree: 4,400g<br>
            Pomegranate juice: 3,600g<br>
            Agave syrup: 2,000g<br>
            Soda water: 600g'
        ],
        [
            'product_id' => 20,
            'material_list'=>'Cucumber juice: 2,400g<br>
            Lime juice: 2,160g<br>
            Mint: 720g<br>
            Agave syrup: 720g'
        ],
        ];
            Raw::insert($raws);

    }
}
