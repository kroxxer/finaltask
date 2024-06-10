<?php

namespace App\Factory;

use App\Entity\Items;
use App\Repository\ItemsRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Items>
 *
 * @method        Items|Proxy                              create(array|callable $attributes = [])
 * @method static Items|Proxy                              createOne(array $attributes = [])
 * @method static Items|Proxy                              find(object|array|mixed $criteria)
 * @method static Items|Proxy                              findOrCreate(array $attributes)
 * @method static Items|Proxy                              first(string $sortedField = 'id')
 * @method static Items|Proxy                              last(string $sortedField = 'id')
 * @method static Items|Proxy                              random(array $attributes = [])
 * @method static Items|Proxy                              randomOrCreate(array $attributes = [])
 * @method static ItemsRepository|ProxyRepositoryDecorator repository()
 * @method static Items[]|Proxy[]                          all()
 * @method static Items[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Items[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Items[]|Proxy[]                          findBy(array $attributes)
 * @method static Items[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Items[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class ItemsFactory extends PersistentProxyObjectFactory
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
        return Items::class;
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
            // ->afterInstantiate(function(Items $items): void {})
        ;
    }
}
