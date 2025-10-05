<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create test user if not exists
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        // Create test product if not exists
        $category = \App\Models\Category::first();
        if (!$category) {
            $category = \App\Models\Category::create(['name' => 'Test Category']);
        }

        $product = Product::firstOrCreate(
            ['name' => 'Test Product'],
            [
                'category_id' => $category->id,
                'price' => 25000,
                'stock' => 100,
            ]
        );

        // Create test sale
        $sale = Sale::create([
            'user_id' => $user->id,
            'total' => 50000,
            'payment_type' => 'cash',
            'payment_amount' => 50000,
            'change_amount' => 0,
        ]);

        // Create sale items
        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'qty' => 2,
            'price' => 25000,
            'subtotal' => 50000,
        ]);

        $this->command->info('Test receipt data created successfully!');
        $this->command->info('Sale ID: ' . $sale->id);
    }
}
