<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::truncate();
        $json = File::get('database/data/regions.json');
        $continents = json_decode($json);
        foreach ($continents as $key => $continent) {
            Region::create([
                'name' => $continent->name,
            ]);
        }
    }
}
