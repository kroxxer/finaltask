<?php

namespace App\Factory;

use App\Entity\Collections;
use App\Repository\CollectionsRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Collections>
 *
 * @method        Collections|Proxy                     create(array|callable $attributes = [])
 * @method static Collections|Proxy                     createOne(array $attributes = [])
 * @method static Collections|Proxy                     find(object|array|mixed $criteria)
 * @method static Collections|Proxy                     findOrCreate(array $attributes)
 * @method static Collections|Proxy                     first(string $sortedField = 'id')
 * @method static Collections|Proxy                     last(string $sortedField = 'id')
 * @method static Collections|Proxy                     random(array $attributes = [])
 * @method static Collections|Proxy                     randomOrCreate(array $attributes = [])
 * @method static CollectionsRepository|RepositoryProxy repository()
 * @method static Collections[]|Proxy[]                 all()
 * @method static Collections[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Collections[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Collections[]|Proxy[]                 findBy(array $attributes)
 * @method static Collections[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Collections[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class CollectionsFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     *
     */
    protected function getDefaults(): array
    {
        return [
            'category' => CategoryFactory::new(),
            'owner' => self::faker()->text(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Collections $collections): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Collections::class;
    }
}
