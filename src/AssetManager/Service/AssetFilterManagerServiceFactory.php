<?php

namespace AssetManager\Service;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class AssetFilterManagerServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AssetFilterManager
    {
        $filters = [];
        $config  = $container->get('config');

        if (!empty($config['asset_manager']['filters'])) {
            $filters = $config['asset_manager']['filters'];
        }

        $assetFilterManager = new AssetFilterManager($filters);

        $assetFilterManager->setServiceLocator($container);
        $assetFilterManager->setMimeResolver($container->get(MimeResolver::class));

        return $assetFilterManager;
    }

    public function createService(ServiceLocatorInterface $serviceLocator): AssetFilterManager
    {
        return $this($serviceLocator, AssetFilterManager::class);
    }
}
