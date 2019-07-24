<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\StatisticB;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class StatisticBType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StatisticB',
        'description' => 'A type',
        'model' => StatisticB::class
    ];

    public function fields(): array
    {
        $interface = GraphQL::type('statistic');
        $fields = $interface->getFields();
        return [
                'someStatistic' => [
                        'resolve' => function ($root) {
                            return $root->some_other_statistic;
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
