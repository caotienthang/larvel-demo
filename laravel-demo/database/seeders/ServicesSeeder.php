<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Basic Streaming Plan',
            'description' => 'Access to all movies and series in standard definition on 1 device at a time.',
            'price' => 5.99,
        ]);

        Service::create([
            'name' => 'Standard Streaming Plan',
            'description' => 'Watch in HD on 2 devices simultaneously with unlimited streaming.',
            'price' => 9.99,
        ]);

        Service::create([
            'name' => 'Premium Streaming Plan',
            'description' => 'Enjoy Ultra HD quality on up to 4 devices simultaneously.',
            'price' => 14.99,
        ]);

        Service::create([
            'name' => 'Kids Plan',
            'description' => 'A safe environment for children with kid-friendly content and parental controls.',
            'price' => 4.99,
        ]);

        Service::create([
            'name' => 'Family Pack',
            'description' => 'Full access for the whole family on multiple devices with premium features.',
            'price' => 19.99,
        ]);
    }
}
