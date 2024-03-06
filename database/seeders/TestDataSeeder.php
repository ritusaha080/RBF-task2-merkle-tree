<?php

namespace Database\Seeders;

use App\Models\leafNode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder

    /**
     * Run the database seeds.
     */
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            LeafNode::create([
                'data' => 'Test Data ' . $i,
                'hash' => hash('sha256', 'Test Data ' . $i)
            ]);
        }
    }

}
