<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\ObjectModel;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class ObjectModelType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ObjectModel',
        'description' => 'A type',
        'model' => ObjectModel::class
    ];

    public function fields(): array
    {
        return [
            'id' => ['type' => Type::id()],
            'morphable' => [
                'type' => GraphQL::type('morphable')
            ]
        ];
    }
}
