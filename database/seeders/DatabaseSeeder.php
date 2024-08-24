<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Product::factory(100)->create();

        Size::query()->create(['name' => 'S']);
        Size::query()->create(['name' => 'M']);
        Size::query()->create(['name' => 'L']);

        Color::query()->create(['name' => 'Green']);
        Color::query()->create(['name' => 'Red']);
        Color::query()->create(['name' => 'Blue']);
        
        for($i=0;$i<100;$i++) {
            ProductVariant::query()->create([
                'product_id' =>rand(1,100),
                'color_id' => rand(1,3),
               'size_id' => rand(1,3),
               'quantity' => rand(10,1000),
               "image"=>"https://canifa.com/img/1517/2000/resize/2/t/2ts24c010-sw001-1.webp",        
            ]);
        }
    }
}
