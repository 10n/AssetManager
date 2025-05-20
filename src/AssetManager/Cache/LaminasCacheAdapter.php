<?php

namespace AssetManager\Cache;

use Assetic\Contracts\Cache\CacheInterface;
use Laminas\Cache\Storage\StorageInterface;

/**
 * Laminas Cache Storage Adapter for Assetic
 */
class LaminasCacheAdapter implements CacheInterface
{
    /**
     * @param StorageInterface $laminasCache Laminas Configured Cache Storage
     */
    public function __construct(
        protected readonly StorageInterface $laminasCache,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function has($key): bool
    {
        return $this->laminasCache->hasItem($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key): mixed
    {
        return $this->laminasCache->getItem($key);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value): bool
    {
        return $this->laminasCache->setItem($key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($key): bool
    {
        return $this->laminasCache->removeItem($key);
    }
}
