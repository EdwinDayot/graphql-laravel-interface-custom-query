<?php

namespace Tests\Unit;

use App\ObjectModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InterfaceWithCustomQueryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function a_custom_query_on_an_interface_s_relation_should_be_called()
    {
        $this->seed(\ObjectsSeeder::class);
        $graphql = <<<'GRAPHQL'
{
  objects {
    id
    morphable {
      id
      statistics {
        id
        someStatistic
      }
    }
  }
}
GRAPHQL;

        $result = \Rebing\GraphQL\Support\Facades\GraphQL::query($graphql);

        $object = ObjectModel::find($result['data']['objects'][0]['id']);
        $filteredStatisticsCount = $object->morphable->statistics->where('some_statistic', 1)->count();
        $this->assertEquals($filteredStatisticsCount, count($result['data']['objects'][0]['morphable']['statistics']));

        foreach ($result['data']['objects'][0]['morphable']['statistics'] as $statistic) {
            $this->assertEquals(1, $statistic->someStatistic);
        }
    }
}
