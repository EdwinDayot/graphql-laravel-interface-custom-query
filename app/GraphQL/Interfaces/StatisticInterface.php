<?php

declare(strict_types=1);

namespace App\GraphQL\Interfaces;

use App\StatisticA;
use App\StatisticB;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\StringType;
use Rebing\GraphQL\Support\InterfaceType;
use GraphQL;

class StatisticInterface extends InterfaceType
{
    protected $attributes = [
        'name' => 'StatisticInterface',
        'description' => 'An example interface',
    ];

    public function resolveType($root)
    {
        if ($root instanceof StatisticA) {
            return GraphQL::type('statistic_a');
        } else if ($root instanceof StatisticB) {
            return GraphQL::type('statistic_b');
        }
    }

    public function fields(): array
    {
        return [
            'id' => ['type' => Type::id()],
            'someStatistic' => [
                'type' => Type::int(),
            ],
        ];
    }
}
