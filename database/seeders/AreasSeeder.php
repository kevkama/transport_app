<?php

namespace Database\Seeders;

use App\Models\Areas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Areas::factory(20)->create();

        Areas::factory()->create([
            'area_name' => 'Kajiado',            
            'description' => 'In Kenya',
            'charges' => '25000',
        ]);
    }
}
