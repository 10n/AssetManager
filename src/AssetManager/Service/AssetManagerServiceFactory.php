<?php

namespace AssetManager\Service;

use AssetManager\Resolver\AggregateResolver;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * Factory class for AssetManagerService
 *
 * @category   AssetManager
 * @package    AssetManager
 */
class AssetManagerServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AssetManager
    {
        $config             = $container->get('config');
        $assetManagerConfig = [];

        if (!empty($config['asset_manager'])) {
            $assetManagerConfig = $config['asset_manager'];
        }

        $assetManager = new AssetManager(
            $container->get(AggregateResolver::class),
            $assetManagerConfig,
        );

        $assetManager->setAssetFilterManager(
            $container->get(AssetFilterManager::class),
        );

        $assetManager->setAssetCacheManager(
            $container->get(AssetCacheManager::class),
        );

        return $assetManager;
    }

    public function createService(ServiceLocatorInterface $serviceLocator): AssetManager
    {
        return $this($serviceLocator, AssetManager::class);
    }
}
