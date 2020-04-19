<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Seed the material database.
     *
     * @return void
     */
    public function run()
    {
        // Minerals
        DB::table('materials')->insert([
            'id' => 34,
            'category' => 'Mineral',
            'name' => 'Tritanium',
        ]);
        DB::table('materials')->insert([
            'id' => 35,
            'category' => 'Mineral',
            'name' => 'Pyerite',
        ]);
        DB::table('materials')->insert([
            'id' => 36,
            'category' => 'Mineral',
            'name' => 'Mexallon',
        ]);
        DB::table('materials')->insert([
            'id' => 37,
            'category' => 'Mineral',
            'name' => 'Isogen',
        ]);
        DB::table('materials')->insert([
            'id' => 38,
            'category' => 'Mineral',
            'name' => 'Nocxium',
        ]);
        DB::table('materials')->insert([
            'id' => 39,
            'category' => 'Mineral',
            'name' => 'Zydrine',
        ]);
        DB::table('materials')->insert([
            'id' => 40,
            'category' => 'Mineral',
            'name' => 'Megacyte',
        ]);

        // P4 Pi

        DB::table('materials')->insert([
            'id' => 2867,
            'category' => 'P4 PI Material',
            'name' => 'Broadcast Node',
        ]);
        DB::table('materials')->insert([
            'id' => 2868,
            'category' => 'P4 PI Material',
            'name' => 'Integrity Response Drones',
        ]);
        DB::table('materials')->insert([
            'id' => 2869,
            'category' => 'P4 PI Material',
            'name' => 'Nano-Factory',
        ]);
        DB::table('materials')->insert([
            'id' => 2870,
            'category' => 'P4 PI Material',
            'name' => 'Organic Mortar Applicators',
        ]);
        DB::table('materials')->insert([
            'id' => 2871,
            'category' => 'P4 PI Material',
            'name' => 'Recursive Computing Module',
        ]);
        DB::table('materials')->insert([
            'id' => 2872,
            'category' => 'P4 PI Material',
            'name' => 'Self-Harmonizing Power Core',
        ]);
        DB::table('materials')->insert([
            'id' => 2875,
            'category' => 'P4 PI Material',
            'name' => 'Sterile Conduits',
        ]);
        DB::table('materials')->insert([
            'id' => 2876,
            'category' => 'P4 PI Material',
            'name' => 'Wetware Mainframe',
        ]);

        	
	
	
	
	
	
	
	
    }
}