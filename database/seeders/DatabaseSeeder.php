<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('nature')->insert([
            ['id' => 1, 'name' => "normal"],
            ['id' => 2, 'name' => "cheap"],
            ['id' => 3, 'name' => "price_shock"],
            ['id' => 4, 'name' => "high_class"],
        ]); // table nature
        DB::table('producer')->insert([
            ['id' => 1, 'name' => "Asus", 'order'=>1,'hidden'=>1],
            ['id' => 2, 'name' => "Acer", 'order'=>2,'hidden'=>1],
            ['id' => 3, 'name' => "Dell", 'order'=>3,'hidden'=>1],
            ['id' => 4, 'name' => "HP", 'order'=>4,'hidden'=>1],
            ['id' => 5, 'name' => "Lenovo", 'order'=>5,'hidden'=>1],
            ['id' => 6, 'name' => "MSI", 'order'=>6,'hidden'=>1],
            ['id' => 7, 'name' => "Apple", 'order'=>7,'hidden'=>1],
            ['id' => 8, 'name' => "Samsung", 'order'=>8,'hidden'=>1],
            ['id' => 9, 'name' => "Sony", 'order'=>9,'hidden'=>0],
            ['id' => 10, 'name' => "LG", 'order'=>10,'hidden'=>1],
        ]); // table producer
        $images_arr = [
            'https://cdn.tgdd.vn/Products/Images/44/309375/asus-vivobook-16-x1605va-i5-mb360w-thumb-laptop-600x600.jpg',
            'https://cdn.tgdd.vn/Products/Images/44/303834/dell-inspiron-16-5620-i5-p1wkn-thumb-600x600.jpg',
            'https://cdn.tgdd.vn/Products/Images/44/292397/dell-vostro-5620-i5-v6i5001w1-thumb-1-600x600.jpg',
            'https://cdn.tgdd.vn/Products/Images/44/312320/hp-victus-16-e1105ax-r5-7c0t0pa-thumb-600x600.jpg',
            'https://cdn.tgdd.vn/Products/Images/44/312320/hp-victus-16-e1105ax-r5-7c0t0pa-thumb-600x600.jpg',
            'https://cdn.tgdd.vn/Products/Images/44/314263/lenovo-thinkpad-e16-gen-1-i7-21jn006uvn-thumb-600x600.jpg',
        ];
        for($i=0; $i<1000; $i++){
            DB::table('product')->insert([
                'producer_id'=>mt_rand(1, 10),
                'name'=>"Laptop ".($i+1),
                'price'=>mt_rand(10000000, 50000000),
                'promotional_price'=>mt_rand(100000, 5000000),
                'image'=>Arr::random($images_arr),
                'view'=>mt_rand(0, 1000),
                'hot'=>mt_rand(0, 1),
                'hidden'=>mt_rand(0, 1),
                'nature'=>mt_rand(0, 3),
            ]);
        }
    }
}
