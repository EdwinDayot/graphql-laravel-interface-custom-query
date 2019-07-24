<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\StatisticA;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class StatisticAType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StatisticA',
        'description' => 'A type',
        'model' => StatisticA::class
    ];

    public function fields(): array
    {
        $interface = GraphQL::type('statistic');
        $fields = $interface->getFields();
        return [
            'someStatistic' => [
                'resolve' => function ($root) {
                    return $root->some_statistic;
                }
            ] + $fields['someStatistic']->config
        ] + $fields;
    }

    public function interfaces(): array
    {
        return [
            GraphQL::type('statistic'),
        ];
    }
}
