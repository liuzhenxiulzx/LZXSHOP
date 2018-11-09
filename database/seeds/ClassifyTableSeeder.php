<?php

use Illuminate\Database\Seeder;

class ClassifyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Brand::class)->times(10)->create();
    }
}
