<?php

declare(strict_types=1);

namespace App\GraphQL\Interfaces;

use App\MorphModelA;
use App\MorphModelB;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\StringType;
use Rebing\GraphQL\Support\InterfaceType;
use GraphQL;

class MorphableInterface extends InterfaceType
{
    protected $attributes = [
        'name' => 'MorphableInterface',
        'description' => 'An example interface',
    ];

    public function resolveType($root)
    {
        if ($root instanceof MorphModelA) {
            return GraphQL::type('morph_model_a');
        } else if ($root instanceof MorphModelB) {
            return GraphQL::type('morph_model_b');
        }
    }

    public function fields(): array
    {
        return [
            'id' => ['type' => Type::id()],
            'statistics' => [
                'type' => Type::listOf(GraphQL::type('statistic')),
                'description' => 'A test field',
                'query' => function (array $args, $query) {
                    // Never called
                    dd('test');
                    return $query->where('some_statistic', 1);
                }
            ],
        ];
    }
}
