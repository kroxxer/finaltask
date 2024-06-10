<?php

namespace App\Factory;

use App\Entity\CustomAttributesValue;
use App\Repository\CustomAttributesValueRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<CustomAttributesValue>
 *
 * @method        CustomAttributesValue|Proxy                              create(array|callable $attributes = [])
 * @method static CustomAttributesValue|Proxy                              createOne(array $attributes = [])
 * @method static CustomAttributesValue|Proxy                              find(object|array|mixed $criteria)
 * @method static CustomAttributesValue|Proxy                              findOrCreate(array $attributes)
 * @method static CustomAttributesValue|Proxy                              first(string $sortedField = 'id')
 * @method static CustomAttributesValue|Proxy                              last(string $sortedField = 'id')
 * @method static CustomAttributesValue|Proxy                              random(array $attributes = [])
 * @method static CustomAttributesValue|Proxy                              randomOrCreate(array $attributes = [])
 * @method static CustomAttributesValueRepository|ProxyRepositoryDecorator repository()
 * @method static CustomAttributesValue[]|Proxy[]                          all()
 * @method static CustomAttributesValue[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static CustomAttributesValue[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static CustomAttributesValue[]|Proxy[]                          findBy(array $attributes)
 * @method static CustomAttributesValue[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static CustomAttributesValue[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class CustomAttributesValueFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return CustomAttributesValue::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(CustomAttributesValue $customAttributesValue): void {})
        ;
    }
}
