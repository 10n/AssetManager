<?php

namespace AssetManager\Service;

use AssetManager\Resolver\MapResolver;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class MapResolverServiceFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): MapResolver
    {
        $config = $container->get('config');
        $map    = [];

        if (isset($config['asset_manager']['resolver_configs']['map'])) {
            $map = $config['asset_manager']['resolver_configs']['map'];
        }

        return new MapResolver($map);
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator): MapResolver
    {
        return $this($serviceLocator, MapResolver::class);
    }
}
