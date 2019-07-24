<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\MorphModelA;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class MorphModelAType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MorphModelA',
        'description' => 'A type',
        'model' => MorphModelA::class
    ];

    public function fields(): array
    {
        $interface = GraphQL::type('morphable');
        $fields = $interface->getFields();
        return [
            /*'statistics' => [
                'query' => function (array $args, $query) {
                    return $query;
                }
            ] + $fields['statistics']->config*/
        ] + $fields;
    }

    public function interfaces(): array
    {
        return [
            GraphQL::type('morphable'),
        ];
    }
}
