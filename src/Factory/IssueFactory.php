<?php

namespace App\Factory;

use App\Entity\Issue;
use App\Repository\IssueRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Issue>
 *
 * @method        Issue|Proxy                              create(array|callable $attributes = [])
 * @method static Issue|Proxy                              createOne(array $attributes = [])
 * @method static Issue|Proxy                              find(object|array|mixed $criteria)
 * @method static Issue|Proxy                              findOrCreate(array $attributes)
 * @method static Issue|Proxy                              first(string $sortedField = 'id')
 * @method static Issue|Proxy                              last(string $sortedField = 'id')
 * @method static Issue|Proxy                              random(array $attributes = [])
 * @method static Issue|Proxy                              randomOrCreate(array $attributes = [])
 * @method static IssueRepository|ProxyRepositoryDecorator repository()
 * @method static Issue[]|Proxy[]                          all()
 * @method static Issue[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Issue[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Issue[]|Proxy[]                          findBy(array $attributes)
 * @method static Issue[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Issue[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class IssueFactory extends PersistentProxyObjectFactory
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
        return Issue::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'email' => self::faker()->text(255),
            'link' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Issue $issue): void {})
        ;
    }
}
