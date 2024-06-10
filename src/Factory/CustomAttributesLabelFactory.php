<?php

namespace App\Factory;

use App\Entity\CustomAttributesLabel;
use App\Repository\CustomAttributesLabelRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<CustomAttributesLabel>
 *
 * @method        CustomAttributesLabel|Proxy                              create(array|callable $attributes = [])
 * @method static CustomAttributesLabel|Proxy                              createOne(array $attributes = [])
 * @method static CustomAttributesLabel|Proxy                              find(object|array|mixed $criteria)
 * @method static CustomAttributesLabel|Proxy                              findOrCreate(array $attributes)
 * @method static CustomAttributesLabel|Proxy                              first(string $sortedField = 'id')
 * @method static CustomAttributesLabel|Proxy                              last(string $sortedField = 'id')
 * @method static CustomAttributesLabel|Proxy                              random(array $attributes = [])
 * @method static CustomAttributesLabel|Proxy                              randomOrCreate(array $attributes = [])
 * @method static CustomAttributesLabelRepository|ProxyRepositoryDecorator repository()
 * @method static CustomAttributesLabel[]|Proxy[]                          all()
 * @method static CustomAttributesLabel[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static CustomAttributesLabel[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static CustomAttributesLabel[]|Proxy[]                          findBy(array $attributes)
 * @method static CustomAttributesLabel[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static CustomAttributesLabel[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class CustomAttributesLabelFactory extends PersistentProxyObjectFactory
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
        return CustomAttributesLabel::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'custom_bool_state' => self::faker()->boolean(),
            'custom_date_state' => self::faker()->boolean(),
            'custom_int_state' => self::faker()->boolean(),
            'custom_string_state' => self::faker()->boolean(),
            'custom_text_state' => self::faker()->boolean(),
            'title' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(CustomAttributesLabel $customAttributesLabel): void {})
        ;
    }
}
