<?php

namespace AssetManager\Service;

use AssetManager\Resolver\ConcatResolver;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class ConcatResolverServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ConcatResolver
    {
        $config = $container->get('config');
        $files  = $config['asset_manager']['resolver_configs']['concat'] ?? [];
        return new ConcatResolver($files);
    }

    /**
     * {@inheritDoc}
     *
     * @return ConcatResolver
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, ConcatResolver::class);
    }
}
