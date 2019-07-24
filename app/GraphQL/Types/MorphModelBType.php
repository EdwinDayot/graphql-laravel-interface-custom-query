<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\MorphModelB;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class MorphModelBType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MorphModelB',
        'description' => 'A type',
        'model' => MorphModelB::class
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
