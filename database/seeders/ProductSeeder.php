<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Lucky Me! Pancit Canton Original (65g)',
                'description' => 'Classic Filipino instant noodles with savory soy-garlic flavor.',
                'qty' => 200,
                'price' => 18,
                'supplier_id' => null,
            ],
            [
                'name' => 'Nissin Cup Noodles Beef (64g)',
                'description' => 'Instant cup noodles with flavorful beef broth.',
                'qty' => 150,
                'price' => 25,
                'supplier_id' => null,
            ],
            [
                'name' => 'Milo Chocolate Drink (220g)',
                'description' => 'Chocolate malt drink fortified with vitamins and minerals.',
                'qty' => 100,
                'price' => 90,
                'supplier_id' => null,
            ],
            [
                'name' => 'Bear Brand Sterilized Milk (200ml)',
                'description' => 'Ready-to-drink milk rich in Iron, Zinc, and Vitamin C.',
                'qty' => 120,
                'price' => 30,
                'supplier_id' => null,
            ],
            [
                'name' => 'C2 Green Tea Apple (355ml)',
                'description' => 'Refreshing apple-flavored green tea in a bottle.',
                'qty' => 80,
                'price' => 25,
                'supplier_id' => null,
            ],
            [
                'name' => 'SkyFlakes Crackers (10s)',
                'description' => 'Classic plain crackers perfect for snacks or soup sides.',
                'qty' => 90,
                'price' => 38,
                'supplier_id' => null,
            ],
            [
                'name' => 'Oishi Pillows Chocolate (150g)',
                'description' => 'Crunchy chocolate cereal pillows with creamy filling.',
                'qty' => 60,
                'price' => 42,
                'supplier_id' => null,
            ],
            [
                'name' => 'Chippy BBQ Corn Chips (110g)',
                'description' => 'Barbecue-flavored corn chips made by Jack n’ Jill.',
                'qty' => 70,
                'price' => 35,
                'supplier_id' => null,
            ],
            [
                'name' => 'Nova Multigrain Chips (78g)',
                'description' => 'Healthy multigrain snack made from oats, corn, and rice.',
                'qty' => 60,
                'price' => 36,
                'supplier_id' => null,
            ],
            [
                'name' => 'Piattos Cheese Chips (85g)',
                'description' => 'Hexagon-shaped potato snacks with real cheese flavor.',
                'qty' => 80,
                'price' => 34,
                'supplier_id' => null,
            ],
            [
                'name' => 'Century Tuna Flakes in Oil (180g)',
                'description' => 'Tuna flakes preserved in vegetable oil, ready to eat.',
                'qty' => 100,
                'price' => 55,
                'supplier_id' => null,
            ],
            [
                'name' => 'Argentina Corned Beef (150g)',
                'description' => 'Canned corned beef with a savory meaty taste.',
                'qty' => 100,
                'price' => 45,
                'supplier_id' => null,
            ],
            [
                'name' => 'Del Monte Pineapple Juice (240ml)',
                'description' => 'Refreshing juice made from 100% real pineapple.',
                'qty' => 90,
                'price' => 26,
                'supplier_id' => null,
            ],
            [
                'name' => 'Energen Chocolate (10s x 40g)',
                'description' => 'Instant breakfast cereal drink with milk, eggs, and vitamins.',
                'qty' => 85,
                'price' => 95,
                'supplier_id' => null,
            ],
            [
                'name' => 'Great Taste White Coffee Mix (30g x 10s)',
                'description' => '3-in-1 instant coffee with creamy white blend.',
                'qty' => 110,
                'price' => 75,
                'supplier_id' => null,
            ],
            [
                'name' => 'Dutch Mill Yogurt Drink (180ml)',
                'description' => 'Probiotic yogurt drink with mixed fruit flavors.',
                'qty' => 100,
                'price' => 20,
                'supplier_id' => null,
            ],
            [
                'name' => 'Selecta Super Thick Ube Ice Cream (1.3L)',
                'description' => 'Creamy ube-flavored ice cream, a Filipino favorite.',
                'qty' => 30,
                'price' => 280,
                'supplier_id' => null,
            ],
            [
                'name' => 'Purefoods Tender Juicy Hotdog (1kg)',
                'description' => 'Juicy and flavorful hotdogs, best for breakfast.',
                'qty' => 40,
                'price' => 185,
                'supplier_id' => null,
            ],
            [
                'name' => 'Red Ribbon Chocolate Dedication Cake (Regular)',
                'description' => 'Moist chocolate cake perfect for birthdays and celebrations.',
                'qty' => 10,
                'price' => 500,
                'supplier_id' => null,
            ],
            [
                'name' => 'Goldilocks Classic Polvoron (20s)',
                'description' => 'Buttery, crumbly Filipino shortbread treats.',
                'qty' => 75,
                'price' => 110,
                'supplier_id' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('Seeded 20 real Filipino food products.');
    }
}
