<?php

namespace AssetManager\Service;

use AssetManager\Resolver\PrioritizedPathsResolver;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class PrioritizedPathsResolverServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): PrioritizedPathsResolver
    {
        $config                   = $container->get('config');
        $prioritizedPathsResolver = new PrioritizedPathsResolver();
        $paths                    = $config['asset_manager']['resolver_configs']['prioritized_paths'] ?? [];
        $prioritizedPathsResolver->addPaths($paths);

        return $prioritizedPathsResolver;
    }

    public function createService(ServiceLocatorInterface $serviceLocator): PrioritizedPathsResolver
    {
        return $this($serviceLocator, PrioritizedPathsResolver::class);
    }
}
