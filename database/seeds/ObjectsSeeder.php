<?php

use Illuminate\Database\Seeder;

class ObjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
