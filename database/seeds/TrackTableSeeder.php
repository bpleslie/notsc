<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackTableSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        factory(App\Track::class, 35 )->create();

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

    }
}