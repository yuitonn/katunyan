<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        Item::create(['name' => 'りゅうきオンニ']);
        Item::create(['name' => 'ゆちゆち']);
        Item::create(['name' => 'ともにゃんにゃん']);
    }
}