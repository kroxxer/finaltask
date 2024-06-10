<?php

namespace App\Factory;

use App\Entity\Likes;
use App\Repository\LikesRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Likes>
 *
 * @method        Likes|Proxy                              create(array|callable $attributes = [])
 * @method static Likes|Proxy                              createOne(array $attributes = [])
 * @method static Likes|Proxy                              find(object|array|mixed $criteria)
 * @method static Likes|Proxy                              findOrCreate(array $attributes)
 * @method static Likes|Proxy                              first(string $sortedField = 'id')
 * @method static Likes|Proxy                              last(string $sortedField = 'id')
 * @method static Likes|Proxy                              random(array $attributes = [])
 * @method static Likes|Proxy                              randomOrCreate(array $attributes = [])
 * @method static LikesRepository|ProxyRepositoryDecorator repository()
 * @method static Likes[]|Proxy[]                          all()
 * @method static Likes[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Likes[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Likes[]|Proxy[]                          findBy(array $attributes)
 * @method static Likes[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Likes[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class LikesFactory extends PersistentProxyObjectFactory
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
        return Likes::class;
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
            // ->afterInstantiate(function(Likes $likes): void {})
        ;
    }
}
