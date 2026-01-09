<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $services = Service::all();

        if ($services->isEmpty()) {
            $this->command->error('No services found.');
            return;
        }

        // Tạo products trước
        $products = [
                        [
                            'name' => 'Classic White T-Shirt',
                            'price' => 19.99,
                            'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab',
                            'description' => 'Timeless white t-shirt made from soft, breathable cotton for daily wear.',
                        ],
                        [
                            'name' => 'Black Essential T-Shirt',
                            'price' => 21.99,
                            'image' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990',
                            'description' => 'Minimal black t-shirt with a clean silhouette, perfect for any outfit.',
                        ],
                        [
                            'name' => 'Oversized Street T-Shirt',
                            'price' => 24.50,
                            'image' => 'https://images.unsplash.com/photo-1602810319428-019690571b5b',
                            'description' => 'Relaxed oversized t-shirt inspired by modern streetwear trends.',
                        ],
                        [
                            'name' => 'Graphic Print T-Shirt',
                            'price' => 27.00,
                            'image' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c',
                            'description' => 'Bold graphic print t-shirt that adds personality to your look.',
                        ],
                        [
                            'name' => 'Vintage Washed T-Shirt',
                            'price' => 26.99,
                            'image' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f',
                            'description' => 'Vintage washed cotton t-shirt with a soft, worn-in feel.',
                        ],
                        [
                            'name' => 'Relaxed Fit Beige T-Shirt',
                            'price' => 22.50,
                            'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a',
                            'description' => 'Neutral beige t-shirt with relaxed fit for effortless styling.',
                        ],
                        [
                            'name' => 'Premium Cotton T-Shirt',
                            'price' => 29.99,
                            'image' => 'https://images.unsplash.com/photo-1523381294911-8d3cead13475',
                            'description' => 'High-quality premium cotton t-shirt with smooth texture and durability.',
                        ],
                        [
                            'name' => 'Athletic Fit T-Shirt',
                            'price' => 23.99,
                            'image' => 'https://images.unsplash.com/photo-1593032465175-481ac7f401a0',
                            'description' => 'Athletic fit t-shirt designed to highlight a modern, active silhouette.',
                        ],
                        [
                            'name' => 'Organic Cotton T-Shirt',
                            'price' => 28.50,
                            'image' => 'https://images.unsplash.com/photo-1556905055-8f358a7a47b2',
                            'description' => 'Eco-friendly organic cotton t-shirt that feels good and looks great.',
                        ],
                        [
                            'name' => 'Minimal Logo T-Shirt',
                            'price' => 25.00,
                            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
                            'description' => 'Clean minimal logo t-shirt for a modern and subtle statement.',
                        ],
                    ];


        foreach ($products as $data) {
            $product = Product::create($data);
        }

        $this->command->info('Products + product_service seeded successfully!');
    }
}
