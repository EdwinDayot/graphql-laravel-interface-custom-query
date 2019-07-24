<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for ($i = 0; $i < 10; $i++) {
            $morphA = \App\MorphModelA::create([]);
            $morphB = \App\MorphModelB::create([]);
            $morphA->object()->create();
            $morphB->object()->create();

            for ($j = 0; $j < 10; $j++) {
                $morphA->statistics()->create([
                    'some_statistic' => $j
                ]);
                $morphB->statistics()->create([
                    'some_other_statistic' => $j
                ]);
            }
        }
    }
}
