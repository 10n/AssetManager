<?php

namespace AssetManager\Service;

use AssetManager\Resolver\CollectionResolver;
use Interop\Container\ContainerInterface;

class CollectionResolverServiceFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): CollectionResolver
    {
        $config      = $container->get('config');
        $collections = [];

        if (isset($config['asset_manager']['resolver_configs']['collections'])) {
            $collections = $config['asset_manager']['resolver_configs']['collections'];
        }

        return new CollectionResolver($collections);
    }
}
